<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Scholar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Scholar_model', 'scholar');
        $this->load->model('Scopus_model', 'scopus');
        $this->load->helper('master', 'master');
    }

    public function import()
    {
        $data['title'] = 'IMPORT SCHOLAR PUBLICATIONS';

        $data['javascript_vendors'] = array(
            'datatables/jquery.dataTables.min.js',
            'datatables-bs4/js/dataTables.bootstrap4.min.js',
            'select2/js/select2.full.min.js',
            'sweetalert2/sweetalert2.min.js');
        $data['javascript'] = array('data-table.js','select2.js');
        $data['javascript_controllers'] = array('pesan.js','pegawai.js');
        // $data['result'] = $this->scholar->getPublication();
        // print_r($data['result']);
        // die;
        // $this->load->view('scopus/import');
        // print_r("ini form import");
        sendTemplateView(1, 'scholar/import', $data);
    }

    public function ajax_publication()
    {
        // WAJIB untuk DataTables
        header('Content-Type: application/json');

        $start = (int) $this->input->post('start', true);
        $draw  = (int) $this->input->post('draw', true);

        $list = $this->scholar->get_datatables();

        $data = [];
        $no = $start;

        foreach ($list as $row) {
            $no++;
            $data[] = [
                $no,
                getAuthorArray($row->author_id,'name') ?? '-',
                $row->accreditation ?? '-',
                $row->title ?? '-',
                $row->journal ?? '-',
                $row->author ?? '-',
                $row->year ?? '-',
                $row->citation ?? 0
            ];
        }

        echo json_encode([
            "draw" => $draw,
            "recordsTotal" => $this->scholar->count_all(),
            "recordsFiltered" => $this->scholar->count_filtered(),
            "data" => $data
        ]);
        exit;
    }



    public function import_process()
    {
        require FCPATH . 'vendor/autoload.php';
        if (empty($_FILES['file']['name'])) {
            $this->session->set_flashdata('msg', 'File tidak ditemukan');
            redirect('scholar/import');
        }
        
        $file = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();
        
        $insert = 0;
        $update = 0;

        foreach ($sheet as $i => $row) {
            if ($i < 5) continue;
            if (empty($row[4])) continue;
        
            $accreditation = trim($row[1]);
            $title         = trim($row[2]);    
            $journal       = trim($row[3]);
            $author_string = trim($row[4]); // Contoh: "Budi Utomo, Andi Wijaya"
            $year          = (int)$row[5];
            $citations     = (int)$row[6];
        
            // 1. Pecah string author berdasarkan koma
            $author_names = explode(',', $author_string);
            $found_ids = [];
        
            // 2. Loop setiap nama untuk mencari ID-nya
            foreach ($author_names as $name) {
                $trimmed_name = trim($name);
                if (empty($trimmed_name)) continue;
        
                $id = $this->scopus->getAuthorIdByNameAdvanced($trimmed_name);
                
                // Jika ID ditemukan, masukkan ke dalam array
                if ($id) {
                    $found_ids[] = $id;
                }
            }
        
            // 3. Gabungkan kembali ID yang ditemukan menjadi string (misal: "12,45,67")
            // Gunakan array_unique agar tidak ada ID ganda jika terjadi duplikasi input
            $final_author_ids = !empty($found_ids) ? implode(',', array_unique($found_ids)) : null;
        
            $data = [
                'author_id'     => $final_author_ids, // Hasil gabungan ID
                'accreditation' => $accreditation,
                'title'         => $title,
                'journal'       => $journal,
                'author'        => $author_string, // Tetap simpan nama aslinya jika perlu
                'year'          => $year,
                'citation'      => $citations,
                'updated_at'    => date('Y-m-d H:i:s')
            ];
            
            // print_r($data);
            // die;
            $result = $this->scholar->upsertPublication($data);
            $result === 'insert' ? $insert++ : $update++;
        }
        $this->session->set_flashdata(
            'msg',
            "Import selesai. Insert: <b>$insert</b>, Update: <b>$update</b>"
        );

        redirect('scholar/import');
    }

    // public function import_process()
    // {
    //     error_reporting(E_ALL);
    //     ini_set('display_errors', 1);

    //     require FCPATH . 'vendor/autoload.php';

    //     if (empty($_FILES['file']['name'])) {
    //         die('File tidak ditemukan');
    //     }

    //     $file = $_FILES['file']['tmp_name'];

    //     try {
    //         $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
    //         $sheet = $spreadsheet->getActiveSheet()->toArray();
    //     } catch (Exception $e) {
    //         die('ERROR IOFactory: ' . $e->getMessage());
    //     }

    //     echo 'BERHASIL LOAD EXCEL';
    //     die;
    // }

}