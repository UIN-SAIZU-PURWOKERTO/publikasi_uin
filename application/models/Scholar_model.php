<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scholar_model extends CI_Model
{
    private $table = 'scholar_publications';

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
            ->where('title', $data['title'])
            ->where('journal', $data['journal'])
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