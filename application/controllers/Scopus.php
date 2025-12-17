<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Scopus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Scopus_model', 'scopus');
        $this->load->helper('master', 'master');
    }

    public function import()
    {
        $data['title'] = 'IMPORT SCOPUS PUBLICATIONS';

        $data['javascript_vendors'] = array(
            'datatables/jquery.dataTables.min.js',
            'datatables-bs4/js/dataTables.bootstrap4.min.js',
            'select2/js/select2.full.min.js',
            'sweetalert2/sweetalert2.min.js');
        $data['javascript'] = array('data-table.js','select2.js');
        $data['javascript_controllers'] = array('pesan.js','pegawai.js');
        $data['result'] = $this->scopus->getPublication();
        // print_r($data['result']);
        // die;
        // $this->load->view('scopus/import');
        // print_r("ini form import");
        sendTemplateView(1, 'scopus/import', $data);
    }

    public function import_process()
    {
        require FCPATH . 'vendor/autoload.php';
        if (empty($_FILES['file']['name'])) {
            $this->session->set_flashdata('msg', 'File tidak ditemukan');
            redirect('scopus/import');
        }
        
        $file = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();
        // print_r($file);
        // die;
        $insert = 0;
        $update = 0;

        foreach ($sheet as $i => $row) {
            if ($i < 5) continue;
            if (empty($row[4])) continue;
        
            $identifier = trim($row[1]);
            $quartile   = trim($row[2]);    
            $title      = trim($row[3]);
            $journal    = trim($row[4]);
            $creator    = trim($row[5]);
            $year       = (int)$row[6];
            $citations  = (int)$row[7];
        
            // 🔗 ambil author_id
            // $author_id = $this->Scopus_model->getAuthorIdByName($creator);
            // $author_id = $this->Scopus_model->getAuthorIdByNameSmart($creator);
            $author_id = $this->Scopus_model->getAuthorIdByNameAdvanced($creator);

        
            $data = [
                'author_id' => $author_id,
                'quartile'  => $quartile,
                'identifier'=> $identifier,
                'title'     => $title,
                'publication_name'   => $journal,
                'creator'   => $creator,
                'year'      => $year,
                'citation' => $citations,
                'updated_at'=> date('Y-m-d H:i:s')
            ];
        
            $result = $this->Scopus_model->upsertPublication($data);
        
            $result === 'insert' ? $insert++ : $update++;
        }
        $this->session->set_flashdata(
            'msg',
            "Import selesai. Insert: <b>$insert</b>, Update: <b>$update</b>"
        );

        redirect('scopus/import');
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