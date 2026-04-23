<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 */
class Scholar_model extends CI_Model
{
    private $table = 'scholar_publications';

    protected $column_order = [
        null,
        'author_id',
        'accreditation',
        'title',
        'journal',
        'author',
        'year',
        'citation'
    ];

    protected $column_search = [
        'author_id',
        'accreditation',
        'title',
        'journal',
        'author',
        'year',
        'citation'
    ];

    protected $order = ['year' => 'desc'];

    private function _get_datatables_query()
    {
        $this->db->from($this->table);

        // 🔎 Custom Filters
        $filter_year = $this->input->post('year', true);
        if (!empty($filter_year)) {
            $this->db->where('year', $filter_year);
        }

        $filter_acc = $this->input->post('accreditation', true);
        if (!empty($filter_acc)) {
            $this->db->where('accreditation', $filter_acc);
        }

        // 🔎 SEARCH
        $search = $this->input->post('search', true);
        if (!empty($search['value'])) {
            $this->db->group_start();
            foreach ($this->column_search as $item) {
                $this->db->or_like($item, $search['value']);
            }
            $this->db->group_end();
        }

        // ↕ ORDER
        $order = $this->input->post('order', true);
        if (!empty($order)) {
            $colIndex = (int) $order[0]['column'];
            $dir = $order[0]['dir'];

            // hindari kolom NULL (No)
            if (isset($this->column_order[$colIndex]) && $this->column_order[$colIndex] !== null) {
                $this->db->order_by($this->column_order[$colIndex], $dir);
            }
        } else {
            $this->db->order_by(key($this->order), current($this->order));
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();

        $length = (int) $this->input->post('length', true);
        $start  = (int) $this->input->post('start', true);

        if ($length !== -1) {
            $this->db->limit($length, $start);
        }

        return $this->db->get()->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        return $this->db->count_all_results();
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function get_distinct_years()
    {
        return $this->db->select('year')
            ->distinct()
            ->order_by('year', 'DESC')
            ->get($this->table)
            ->result_array();
    }

    public function get_distinct_accreditations()
    {
        return $this->db->select('accreditation')
            ->distinct()
            ->order_by('accreditation', 'ASC')
            ->get($this->table)
            ->result_array();
    }

    public function exists($identifier, $year)
    {
        return $this->db
            ->where('identifier', $identifier)
            ->where('year', $year)
            ->count_all_results($this->table) > 0;
    }

    public function getPublication()
    {
        // $this->db->where('is_delete', '0');
        return $this->db->get('scholar_publications')->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_by_identifier_year($identifier, $year, $data)
    {
        return $this->db
            ->where('identifier', $identifier)
            ->where('year', $year)
            ->update($this->table, $data);
    }

    public function getAuthorIdByName($name)
    {
        return $this->db
            ->select('id')
            ->from('sinta_authors')
            ->where('is_deleted', 0)
            ->like('LOWER(name)', strtolower($name))
            ->get()
            ->row('id');
    }

    public function getAuthorIdByNameSmart($name)
    {
        // normalisasi
        $name = strtolower($name);
        $name = preg_replace('/[^a-z\s]/', '', $name); // hapus koma, titik
        $parts = array_filter(explode(' ', $name));

        if (empty($parts)) {
            return null;
        }

        $this->db->select('id');
        $this->db->from('sinta_authors');
        $this->db->where('is_deleted', 0);

        foreach ($parts as $p) {
            if (strlen($p) < 2) continue; // skip inisial
            $this->db->like('LOWER(name)', $p);
        }

        $this->db->order_by('LENGTH(name)', 'ASC'); // nama paling mendekati
        $result = $this->db->get()->row();

        return $result ? $result->id : null;
    }

    public function getAuthorIdByNameAdvanced($name)
    {
        // === NORMALISASI ===
        $raw = strtoupper($name);
        $raw = str_replace(['.', ','], ' ', $raw);
        $raw = preg_replace('/\s+/', ' ', trim($raw));

        $parts = explode(' ', $raw);

        $initials = [];
        $keywords = [];

        foreach ($parts as $p) {
            if (strlen($p) === 1) {
                $initials[] = $p;
            } elseif (strlen($p) >= 4) {
                $keywords[] = $p;
            }
        }

        if (empty($keywords) && empty($initials)) {
            return null;
        }

        // === QUERY DASAR ===
        $this->db->select('id, name');
        $this->db->from('sinta_authors');
        $this->db->where('is_deleted', 0);

        foreach ($keywords as $k) {
            $this->db->like('UPPER(name)', $k);
        }

        $candidates = $this->db->get()->result();

        if (!$candidates) return null;

        // === HITUNG SKOR ===
        $bestScore = 0;
        $bestId = null;

        foreach ($candidates as $c) {
            $score = 0;
            $dbName = strtoupper($c->name);

            // kata panjang (nilai besar)
            foreach ($keywords as $k) {
                if (strpos($dbName, $k) !== false) {
                    $score += 3;
                }
            }

            // inisial
            foreach ($initials as $i) {
                if (preg_match('/\b' . $i . '[A-Z]*/', $dbName)) {
                    $score += 1;
                }
            }

            if ($score > $bestScore) {
                $bestScore = $score;
                $bestId = $c->id;
            }
        }

        // threshold aman
        return $bestScore >= 3 ? $bestId : null;
    }



    public function upsertPublication($data)
    {
        $exists = $this->db
            ->where('journal', $data['journal'])
            ->where('author', $data['author'])
            ->where('year', $data['year'])
            ->get('scholar_publications')
            ->row();

        if ($exists) {
            $this->db
                ->where('id', $exists->id)
                ->update('scholar_publications', $data);
            return 'update';
        } else {
            $this->db->insert('scholar_publications', $data);
            return 'insert';
        }
    }


}