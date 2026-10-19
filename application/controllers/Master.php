<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Master_model', 'master');
        $this->load->helper('master', 'master');
    }

    public function fakultas()
    {
        $data['title'] = 'Master Fakultas';

        $data['javascript_vendors'] = array(
            'datatables/jquery.dataTables.min.js',
            'datatables-bs4/js/dataTables.bootstrap4.min.js',
            'select2/js/select2.full.min.js',
            'sweetalert2/sweetalert2.min.js');
        $data['javascript'] = array('data-table.js','select2.js');
        $data['javascript_controllers'] = array('pesan.js','pegawai.js');

        $data['result'] = $this->master->getFakultas();

        sendTemplateView(1, 'master/fakultas', $data);
    }

    public function prodi()
    {
        $data['title'] = 'Master Program Studi';

        $data['javascript_vendors'] = array(
            'datatables/jquery.dataTables.min.js',
            'datatables-bs4/js/dataTables.bootstrap4.min.js',
            'select2/js/select2.full.min.js',
            'sweetalert2/sweetalert2.min.js');
        $data['javascript'] = array('data-table.js','select2.js');
        $data['javascript_controllers'] = array('pesan.js','pegawai.js');

        $data['result'] = $this->master->getProdi();

        sendTemplateView(1, 'master/prodi', $data);
    }

    public function author()
    {
        $data['title'] = 'Master Author';

        $data['javascript_vendors'] = array(
            'datatables/jquery.dataTables.min.js',
            'datatables-bs4/js/dataTables.bootstrap4.min.js',
            'select2/js/select2.full.min.js',
            'sweetalert2/sweetalert2.min.js');
        $data['javascript'] = array('data-table.js','select2.js');
        $data['javascript_controllers'] = array('pesan.js','pegawai.js');

        $data['result'] = $this->master->getAuthor();
        $data['listProdi'] = $this->master->getProdi();

        sendTemplateView(1, 'master/author', $data);
    }
    
    public function karyawan()
    {
        $data['title'] = 'Master Karyawan';

        $data['javascript_vendors'] = array(
            'datatables/jquery.dataTables.min.js',
            'datatables-bs4/js/dataTables.bootstrap4.min.js',
            'select2/js/select2.full.min.js',
            'sweetalert2/sweetalert2.min.js');
        $data['javascript'] = array('data-table.js','select2.js');
        $data['javascript_controllers'] = array('pesan.js','pegawai.js');

        $data['result'] = $this->master->getKaryawan();
        $data['resultById'] = $this->master->getKaryawanById(($this->session->userdata('id')));

        sendTemplateView(1, 'master/karyawan', $data);
    }

    public function addFakultas()
    {
        $this->master->add_fakultas($this->input->post());
        $this->session->set_flashdata('flash', 'Berhasil menambah fakultas');
        redirect('master/fakultas');
    }

    public function update_prodi_author()
    {
        $this->output->set_content_type('application/json');

        $author_id = $this->input->post('author_id');
        $prodi_id  = $this->input->post('prodi_id');

        if (!$author_id || !$prodi_id) {
            echo json_encode(['status' => 'error', 'message' => 'Data author atau program studi tidak valid']);
            return;
        }

        $this->db->where('id', $author_id);
        $updated = $this->db->update('sinta_authors', [
            'prodi_id' => $prodi_id
        ]);

        if ($updated) {
            echo json_encode(['status' => 'success', 'message' => 'Program Studi berhasil diperbarui']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data di database']);
        }
    }

    public function hapusAuthor($id)
    {
        $this->master->deleteauthor($id);
        // print_r($query);
        // die;
        $this->session->set_flashdata('flashsalah', 'Berhasil menghapus author');
        redirect('master/author');
    }

    /**
     * Mapping header Excel SINTA (sudah dinormalisasi) => kolom sinta_authors.
     * Header dinormalisasi: huruf besar, isi kurung dibuang, hanya huruf/angka.
     * Contoh: "SINTA SCORE OVERALL (Versi 3)" => "SINTASCOREOVERALL"
     */
    private $authorTextColumns = [
        'NIDN'               => 'nidn',
        'NAMA'               => 'name',
        'AFILIASI'           => 'affiliation_name',
        'PRODI'              => 'department',
        'PENDIDIKANTERAKHIR' => 'pendidikan_terakhir',
        'JABATANFUNGSIONAL'  => 'jabatan_fungsional',
        'GELARDEPAN'         => 'gelar_depan',
        'GELARBELAKANG'      => 'gelar_belakang',
    ];

    // Skor SINTA bisa desimal, mis. "516,33" / "1883,5"
    private $authorDecimalColumns = [
        'SINTASCOREOVERALL'      => 'score_overall',
        'SINTASCORE3YR'          => 'score_3_years',
        'AFILIASISCOREOVERALL'   => 'score_affiliation',
        'AFILIASISCORE3YR'       => 'score_affiliation_3_years',
    ];

    private $authorIntColumns = [
        'DOKUMENSCOPUS'          => 'articles_scopus',
        'SITASISCOPUS'           => 'citations_scopus',
        'DOKUMENTERSITASISCOPUS' => 'cited_scopus',
        'HINDEXSCOPUS'           => 'h_index_scopus',
        'GINDEXSCOPUS'           => 'g_index_scopus',
        'I10INDEXSCOPUS'         => 'i10_index_scopus',

        'DOKUMENGS'              => 'articles_scholar',
        'SITASIGS'               => 'citations_scholar',
        'DOKUMENTERSITASIGS'     => 'cited_scholar',
        'HINDEXGS'               => 'h_index_scholar',
        'GINDEXGS'               => 'g_index_scholar',
        'I10INDEXGS'             => 'i10_index_scholar',

        'DOKUMENWOS'             => 'articles_wos',
        'SITASIWOS'              => 'citations_wos',
        'DOKUMENTERSITASIWOS'    => 'cited_wos',
        'HINDEXWOS'              => 'h_index_wos',
        'GINDEXWOS'              => 'g_index_wos',
        'I10INDEXWOS'            => 'i10_index_wos',

        'DOKUMENGARUDA'          => 'articles_garuda',
        'SITASIGARUDA'           => 'citations_garuda',
        'DOKUMENTERSITASIGARUDA' => 'cited_garuda',
    ];

    public function importAuthor()
    {
        if (empty($_FILES['file']['name']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            $this->session->set_flashdata('flashsalah', 'File Excel tidak ditemukan / gagal diupload');
            redirect('master/author');
        }

        $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, ['xls', 'xlsx', 'csv'])) {
            $this->session->set_flashdata('flashsalah', 'Format file harus .xls, .xlsx atau .csv');
            redirect('master/author');
        }

        require_once FCPATH . 'vendor/autoload.php';
        set_time_limit(300);

        try {
            $file   = $_FILES['file']['tmp_name'];
            $reader = IOFactory::createReader(ucfirst($ext));
            $reader->setReadDataOnly(true);
            $sheet  = $reader->load($file)->getActiveSheet()->toArray(null, true, false, false);
        } catch (\Throwable $e) {
            $this->session->set_flashdata('flashsalah', 'File Excel tidak dapat dibaca');
            redirect('master/author');
        }

        // Cari baris header (baris yang memuat kolom SINTAID)
        $headerRow = null;
        $colMap    = [];
        foreach (array_slice($sheet, 0, 20, true) as $i => $row) {
            $map = [];
            foreach ($row as $col => $cell) {
                $key = $this->normalizeHeader($cell);
                if ($key !== '' && !isset($map[$key])) {
                    $map[$key] = $col;
                }
            }
            if (isset($map['SINTAID'])) {
                $headerRow = $i;
                $colMap    = $map;
                break;
            }
        }

        if ($headerRow === null || !isset($colMap['NAMA'])) {
            $this->session->set_flashdata('flashsalah', 'Header kolom SINTAID / NAMA tidak ditemukan di file');
            redirect('master/author');
        }

        $records = [];
        $skipped = 0;
        foreach ($sheet as $i => $row) {
            if ($i <= $headerRow) continue;

            $sintaId = $this->toInt(isset($row[$colMap['SINTAID']]) ? $row[$colMap['SINTAID']] : null);
            if (!$sintaId) {
                // baris kosong / tidak valid
                if (implode('', array_map('strval', $row)) !== '') $skipped++;
                continue;
            }

            $data = [];

            foreach ($this->authorTextColumns as $header => $field) {
                if (!isset($colMap[$header])) continue;
                $value = $row[$colMap[$header]];

                // NIDN numerik: hindari notasi ilmiah (1,97E+17) & kembalikan angka 0 di depan
                if ($field === 'nidn') {
                    if (is_int($value)) {
                        $value = (string) $value;
                    } elseif (is_float($value)) {
                        $value = sprintf('%.0f', $value);
                    }
                    $value = ltrim(trim((string) $value), "'");
                    if (ctype_digit($value) && strlen($value) === 9) {
                        $value = '0' . $value;
                    }
                }

                $value = trim((string) $value);
                // nilai kosong tidak menimpa data lama
                if ($value !== '') {
                    $data[$field] = $value;
                }
            }

            foreach ($this->authorDecimalColumns as $header => $field) {
                if (!isset($colMap[$header])) continue;
                $num = $this->toNumber($row[$colMap[$header]]);
                $data[$field] = $num === null ? 0 : round($num, 2);
            }

            foreach ($this->authorIntColumns as $header => $field) {
                if (!isset($colMap[$header])) continue;
                $data[$field] = (int) $this->toInt($row[$colMap[$header]]);
            }

            $records[$sintaId] = $data;
        }

        if (empty($records)) {
            $this->session->set_flashdata('flashsalah', 'Tidak ada data author yang valid di file');
            redirect('master/author');
        }

        $markMissing = (bool) $this->input->post('mark_missing');
        $stats = $this->master->importAuthors($records, $markMissing);

        if ($stats === false) {
            $this->session->set_flashdata('flashsalah', 'Import gagal, tidak ada data yang diubah');
            redirect('master/author');
        }

        $stats['total']   = count($records);
        $stats['skipped'] = $skipped;
        $stats['missing_headers'] = array_values(array_diff(
            array_keys($this->authorTextColumns + $this->authorDecimalColumns + $this->authorIntColumns),
            array_keys($colMap)
        ));

        $this->session->set_flashdata('import_author_result', $stats);
        $this->session->set_flashdata('flash', 'Import data author selesai');
        redirect('master/author');
    }

    /**
     * Sinkronkan sinta_affiliations_authors dari sinta_authors tanpa upload Excel.
     */
    public function syncAffiliationAuthors()
    {
        $this->db->trans_start();
        $result = $this->master->syncAffiliationAuthors();
        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $this->session->set_flashdata('flashsalah', 'Sinkronisasi gagal, tidak ada data yang diubah');
        } else {
            $this->session->set_flashdata('flash', sprintf(
                'Sinkron selesai: %d diperbarui, %d ditambahkan, %d dihapus',
                $result['updated'], $result['inserted'], $result['deleted']
            ));
        }
        redirect('master/author');
    }

    private function normalizeHeader($value)
    {
        $value = strtoupper(trim((string) $value));
        $value = preg_replace('/\(.*?\)/', '', $value);
        return preg_replace('/[^A-Z0-9]/', '', $value);
    }

    private function toInt($value)
    {
        $num = $this->toNumber($value);
        return $num === null ? null : (int) round($num);
    }

    /**
     * Parse angka dari sel Excel, mendukung format Indonesia & Inggris:
     * "516,33" => 516.33, "1.883,5" => 1883.5, "1.234" => 1234,
     * "1,234.5" => 1234.5, "12.75" => 12.75. Selain angka => null.
     */
    private function toNumber($value)
    {
        if ($value === null || $value === '') return null;
        if (is_int($value) || is_float($value)) return (float) $value;

        $s = preg_replace('/\s+/', '', (string) $value);
        if ($s === '' || !preg_match('/^-?[0-9.,]+$/', $s)) return null;

        $lastDot   = strrpos($s, '.');
        $lastComma = strrpos($s, ',');

        if ($lastDot !== false && $lastComma !== false) {
            // pemisah yang muncul terakhir = desimal
            if ($lastComma > $lastDot) {
                $s = str_replace(['.', ','], ['', '.'], $s);
            } else {
                $s = str_replace(',', '', $s);
            }
        } elseif ($lastComma !== false) {
            // hanya koma: format Indonesia (koma = desimal), kecuali pola ribuan "1,234,567"
            $s = substr_count($s, ',') > 1 ? str_replace(',', '', $s) : str_replace(',', '.', $s);
        } elseif ($lastDot !== false) {
            // hanya titik: "1.234" / "1.234.567" = ribuan, "12.75" = desimal
            if (substr_count($s, '.') > 1 || preg_match('/^-?\d{1,3}\.\d{3}$/', $s)) {
                $s = str_replace('.', '', $s);
            }
        }

        return is_numeric($s) ? (float) $s : null;
    }

}