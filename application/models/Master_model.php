<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getFakultas()
    {
        $this->db->where('is_delete', '0');
        return $this->db->get('mst_fakultas')->result_array();
    }

    public function getProdi()
    {
        $this->db->where('is_delete', '0');
        return $this->db->get('mst_prodi')->result_array();
    }

    public function getAuthor()
    {
        $this->db->where('is_deleted', '0');
        return $this->db->get('sinta_authors')->result_array();
    }

    public function getBulan()
    {
        return $this->db->get('l_bulan')->result_array();
    }

    public function getTahun()
    {
        return $this->db->get('l_tahun')->result_array();
    }

    public function getKaryawan()
    {
        $this->db->select('id,name,email,password,role_id');
        return $this->db->get('users')->result_array();
    }

    public function add_fakultas($input)
    {
        $data["fakultas_name"]       = $input['name'];
        $data["singkatan"]       = $input['singkatan'];
        $data["is_delete"]        = 0;

        $this->db->insert('mst_fakultas',$data);
    }

    public function deleteauthor($id)
    {
        $data["is_deleted"]        = 1;

        $this->db->where('id', $id);
        $this->db->update('sinta_authors',$data);

        // jaga agar sinta_affiliations_authors tetap sinkron
        $this->db->where('id', (string) $id)->delete('sinta_affiliations_authors');
    }

    /**
     * Upsert data author hasil import Excel SINTA.
     *
     * @param array $records      [sinta_id => [kolom => nilai]] (sudah di-parse controller)
     * @param bool  $markMissing  true = author yang tidak ada di file ditandai is_deleted = 1
     * @return array statistik import
     */
    public function importAuthors(array $records, $markMissing = false)
    {
        $stats = [
            'inserted'        => 0,
            'updated'         => 0,
            'restored'        => 0,
            'deleted'         => 0,
            'prodi_matched'   => 0,
            'prodi_unmatched' => [],
        ];

        // Data author yang sudah ada (termasuk yang terhapus)
        $existing = [];
        $affiliations = [];
        $rows = $this->db->select('id, prodi_id, is_deleted, affiliation_id, affiliation_name, affiliation_url')
                         ->get('sinta_authors')->result_array();
        foreach ($rows as $r) {
            $existing[(int) $r['id']] = $r;
            if (!empty($r['affiliation_name']) && !empty($r['affiliation_id'])) {
                $affiliations[strtolower(trim($r['affiliation_name']))] = [
                    'affiliation_id'  => $r['affiliation_id'],
                    'affiliation_url' => $r['affiliation_url'],
                ];
            }
        }

        $prodiIndex = $this->buildProdiIndex();

        $this->db->trans_start();

        foreach ($records as $id => $data) {
            $old = isset($existing[$id]) ? $existing[$id] : null;

            // Cocokkan prodi hanya jika prodi_id masih kosong
            if ((!$old || empty($old['prodi_id'])) && !empty($data['department'])) {
                $prodiId = $this->matchProdi($data['department'], $prodiIndex);
                if ($prodiId) {
                    $data['prodi_id'] = $prodiId;
                    $stats['prodi_matched']++;
                } else {
                    $stats['prodi_unmatched'][$data['department']] = true;
                }
            }

            $data['is_deleted'] = 0;

            if ($old) {
                if ((int) $old['is_deleted'] === 1) {
                    $stats['restored']++;
                }
                $this->db->where('id', $id)->update('sinta_authors', $data);
                $stats['updated']++;
            } else {
                $data['id']  = $id;
                $data['url'] = 'https://sinta.kemdiktisaintek.go.id/authors/profile/' . $id;

                $affKey = isset($data['affiliation_name']) ? strtolower(trim($data['affiliation_name'])) : '';
                if ($affKey !== '' && isset($affiliations[$affKey])) {
                    $data = array_merge($data, $affiliations[$affKey]);
                }

                $this->db->insert('sinta_authors', $data);
                $stats['inserted']++;
            }
        }

        if ($markMissing && !empty($records)) {
            $this->db->where('is_deleted', 0)
                     ->where_not_in('id', array_keys($records))
                     ->update('sinta_authors', ['is_deleted' => 1]);
            $stats['deleted'] = $this->db->affected_rows();
        }

        // Samakan tabel sinta_affiliations_authors dengan sinta_authors terbaru
        $stats['aff_sync'] = $this->syncAffiliationAuthors();

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            return false;
        }

        $stats['prodi_unmatched'] = array_keys($stats['prodi_unmatched']);
        return $stats;
    }

    /**
     * Sinkronisasi penuh sinta_affiliations_authors dari sinta_authors:
     * - author aktif   => insert / update
     * - author terhapus atau tidak ada di sinta_authors => dihapus
     * Kolom yang tidak ada di sinta_authors (department_url) tidak diubah.
     *
     * @return array ['inserted' => n, 'updated' => n, 'deleted' => n]
     */
    public function syncAffiliationAuthors()
    {
        $result = ['inserted' => 0, 'updated' => 0, 'deleted' => 0];

        $authors = $this->db->select('id, name, department, url, photo, h_index_scholar, h_index_scopus,
                                      score_overall, score_3_years, score_affiliation, score_affiliation_3_years')
                            ->where('is_deleted', 0)
                            ->get('sinta_authors')->result_array();

        $existing = array_flip(array_column(
            $this->db->select('id')->get('sinta_affiliations_authors')->result_array(),
            'id'
        ));

        $activeIds = [];
        foreach ($authors as $a) {
            $id = (string) $a['id'];
            $activeIds[] = $id;

            $row = [
                'name'                => $a['name'],
                'h_index_scholar'     => $a['h_index_scholar'],
                'h_index_scopus'      => $a['h_index_scopus'],
                'sinta_score'         => $a['score_overall'],
                'sinta_score_3_years' => $a['score_3_years'],
                'affil_score'         => $a['score_affiliation'],
                'affil_score_3_years' => $a['score_affiliation_3_years'],
            ];
            if (!empty($a['department'])) {
                $row['department_name'] = $this->formatDepartmentName($a['department']);
            }
            if (!empty($a['photo'])) {
                $row['profile_picture'] = $a['photo'];
            }

            if (isset($existing[$id])) {
                $this->db->where('id', $id)->update('sinta_affiliations_authors', $row);
                $result['updated']++;
            } else {
                $row['id']  = $id;
                $row['url'] = !empty($a['url'])
                    ? $a['url']
                    : 'https://sinta.kemdiktisaintek.go.id/authors/profile/' . $id;
                $this->db->insert('sinta_affiliations_authors', $row);
                $result['inserted']++;
            }
        }

        // Hapus yang tidak aktif lagi
        $stale = array_diff(array_keys($existing), $activeIds);
        if (!empty($stale)) {
            $this->db->where_in('id', array_map('strval', $stale))->delete('sinta_affiliations_authors');
            $result['deleted'] = $this->db->affected_rows();
        }

        return $result;
    }

    /**
     * Format department mengikuti format lama tabel sinta_affiliations_authors:
     * "S2 Komunikasi dan Penyiaran Islam" / "S2 - Komunikasi ..." => "Komunikasi dan Penyiaran Islam (S2)"
     */
    private function formatDepartmentName($department)
    {
        $department = trim($department);
        if (preg_match('/^(S1|S2|S3|D3|D4|PROFESI)\s*[-–:]?\s+(.+)$/iu', $department, $m)) {
            return trim($m[2]) . ' (' . strtoupper($m[1]) . ')';
        }
        return $department;
    }

    /**
     * Index mst_prodi untuk pencocokan nama prodi dari Excel.
     */
    private function buildProdiIndex()
    {
        $index = ['by_level' => [], 'by_name' => []];

        foreach ($this->getProdi() as $p) {
            $level = strtoupper(trim($p['nama_jenjang_pendidikan']));
            $names = array_unique([
                $this->normalizeProdiName($p['nama_program_studi']),
                // versi tanpa isi kurung, mis. "Hukum Keluarga (Ahwal Al Syakhshiyah)"
                $this->normalizeProdiName(preg_replace('/\(.*?\)/', '', $p['nama_program_studi'])),
            ]);

            foreach ($names as $name) {
                if ($name === '') continue;
                $index['by_level'][$level . '|' . $name] = (int) $p['id'];
                $index['by_name'][$name][(int) $p['id']] = true;
            }
        }

        return $index;
    }

    /**
     * Mencocokkan teks prodi Excel (mis. "S1 - Pendidikan Agama Islam",
     * "Pendidikan Agama Islam (S1)" atau "Informatika") ke id mst_prodi.
     */
    private function matchProdi($text, array $index)
    {
        $text  = trim($text);
        $level = null;
        $name  = $text;

        if (preg_match('/^\s*(S1|S2|S3|D3|D4|PROFESI)\s*[-–:]\s*(.+)$/iu', $text, $m)) {
            $level = strtoupper($m[1]);
            $name  = $m[2];
        } elseif (preg_match('/^(.+?)\s*\(\s*(S1|S2|S3|D3|D4|PROFESI)\s*\)\s*$/iu', $text, $m)) {
            $level = strtoupper($m[2]);
            $name  = $m[1];
        } elseif (preg_match('/^\s*(S1|S2|S3|D3|D4)\s+(.+)$/iu', $text, $m)) {
            $level = strtoupper($m[1]);
            $name  = $m[2];
        }

        $name = $this->normalizeProdiName($name);
        if ($name === '') return null;

        if ($level !== null) {
            $key = $level . '|' . $name;
            return isset($index['by_level'][$key]) ? $index['by_level'][$key] : null;
        }

        // Tanpa jenjang: hanya cocok jika namanya unik
        if (isset($index['by_name'][$name]) && count($index['by_name'][$name]) === 1) {
            return (int) key($index['by_name'][$name]);
        }

        return null;
    }

    private function normalizeProdiName($name)
    {
        $name = strtolower((string) $name);
        $name = str_replace(['`', "'", '’'], '', $name);
        $name = preg_replace('/[^a-z0-9]+/', ' ', $name);
        return trim(preg_replace('/\s+/', ' ', $name));
    }

}