<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Master_model', 'master');
        $this->load->helper('master', 'master');
    }

    public function jadwal()
    {
        $data['title'] = 'Jadwal Tes Psikotes';

        $data['javascript_vendors'] = array(
            'datatables/jquery.dataTables.min.js',
            'datatables-bs4/js/dataTables.bootstrap4.min.js',
            'sweetalert2/sweetalert2.min.js');
        $data['javascript'] = array('data-table.js');
        $data['javascript_controllers'] = array('pesan.js');

        $data['result'] = $this->master->getJadwal();
        $data['jenistes'] = $this->master->getJenistes();
        // print_r($data['jenistes']);
        // die;

        // if(!empty($this->input->get('id'))){
        //     $data['loaddata'] = $this->jaspel->getLviById($this->input->get('id'));
        // }
        
        sendTemplateView(1, 'master/jadwal', $data);
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
        $author_id = $this->input->post('author_id');
        $prodi_id  = $this->input->post('prodi_id');

        if (!$author_id || !$prodi_id) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
            return;
        }

        $this->db->where('id', $author_id);
        $this->db->update('sinta_authors', [
            'prodi_id' => $prodi_id
        ]);

        echo json_encode(['status' => 'success']);
    }


    public function ubahPejabat()
    {
        $this->master->updatepejabat($this->input->post());
        $this->session->set_flashdata('flash', 'Berhasil merubah data pejabat');
        redirect($_SERVER['HTTP_REFERER']);
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