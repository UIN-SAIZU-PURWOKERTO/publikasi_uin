<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Jurnal_model', 'jurnal');
        $this->load->helper('master', 'master');
    }

    public function index()
    {
        $data['title'] = 'Data Jurnal';

        $data['javascript_vendors'] = array(
            'datatables/jquery.dataTables.min.js',
            'datatables-bs4/js/dataTables.bootstrap4.min.js',
            'select2/js/select2.full.min.js',
            'sweetalert2/sweetalert2.min.js');
        $data['javascript'] = array('data-table.js','select2.js');
        $data['javascript_controllers'] = array('pesan.js','pegawai.js');

        $data['result'] = $this->jurnal->getJurnal();

        sendTemplateView(1, 'jurnal/index', $data);
    }

    public function addJurnal()
    {
        $this->jurnal->add_jurnal($this->input->post());
        $this->session->set_flashdata('flash', 'Berhasil');
        redirect('jurnal/index');
    }

    public function hapusAuthor($id)
    {
        $this->master->deleteauthor($id);
        // print_r($query);
        // die;
        $this->session->set_flashdata('flashsalah', 'Berhasil menghapus author');
        redirect('master/author');
    }

}