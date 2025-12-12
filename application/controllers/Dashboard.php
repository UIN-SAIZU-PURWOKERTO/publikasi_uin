<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // ini untuk login
        // is_logged_in();
        $this->load->model('Dashboard_model', 'dashboard');
        $this->load->helper('master', 'master');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        $data['javascript_vendors'] = array('datatables/jquery.dataTables.min.js','datatables-bs4/js/dataTables.bootstrap4.min.js','sweetalert2/sweetalert2.min.js','chart.js/Chart.min.js', 'apex/apexcharts.min.js');
        $data['javascript'] = array('data-table.js');
        $data['javascript_controllers'] = array('dashboard.js','pesan.js');

        $query = $this->db->get('sinta_authors');
        $data['lecturers'] = [];

        foreach ($query->result() as $row) {
            $data['lecturers'][] = [
                'foto' => $row->foto,
                'nama' => $row->name,
                'dept' => $row->department,
                'score_all' => $row->score_overall,
                'score_3_years' => $row->score_3_years,
                'artikel_scholar' => $row->articles_scholar,
                'artikel_scopus' => $row->articles_scopus,
                'artikel_wos' => $row->articles_wos,
                'cit_scholar' => $row->citations_scholar,
                'cit_scopus' => $row->citations_scopus,
                'cit_wos' => $row->citations_wos,
                'subject' => explode(",", $row->subjects) // convert string → array
            ];
        }

        sendTemplateView(1, 'dashboard', $data);
    }

    public function authors()
    {
        $data['title'] = 'Authors Data';

        $data['javascript_vendors'] = array('datatables/jquery.dataTables.min.js','datatables-bs4/js/dataTables.bootstrap4.min.js','sweetalert2/sweetalert2.min.js','chart.js/Chart.min.js', 'apex/apexcharts.min.js');
        $data['javascript'] = array('data-table.js');
        $data['javascript_controllers'] = array('dashboard_authors.js','pesan.js');

        // $this->load->library('pagination');

        // === PAGINATION CONFIG ===
        // $config['base_url'] = base_url('dashboard/authors');
        // $config['total_rows'] = $this->db->count_all('sinta_authors');
        // $config['per_page'] = 6;
        // $config['uri_segment'] = 3;

        // Tampilan bootstrap
        // $config['full_tag_open'] = '<ul class="pagination justify-content-center mt-3">';
        // $config['full_tag_close'] = '</ul>';
        // $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['num_tag_close'] = '</span></li>';
        // $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        // $config['cur_tag_close'] = '</span></li>';
        // $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['prev_tag_close'] = '</span></li>';
        // $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['next_tag_close'] = '</span></li>';

        // $this->pagination->initialize($config);

        // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // GET DATA
        // $query = $this->db
        //     ->order_by('name', 'ASC')
        //     ->limit($config['per_page'], $page)
        //     ->get('sinta_authors');

        $query = $this->db
            ->order_by('name', 'ASC')
            ->get('sinta_authors');

        $data['lecturers'] = [];
        foreach ($query->result() as $r) {
            $data['lecturers'][] = [
                'photo' => $r->photo,
                'nama' => $r->name,
                'dept' => $r->department,
                'score_all' => $r->score_overall,
                'score_3_years' => $r->score_3_years,
                'artikel_scholar' => $r->articles_scholar,
                'artikel_scopus' => $r->articles_scopus,
                'artikel_wos' => $r->articles_wos,
                'cit_scholar' => $r->citations_scholar,
                'cit_scopus' => $r->citations_scopus,
                'cit_wos' => $r->citations_wos,
                'subject' => explode(",", $r->subjects)
            ];
        }

        // $data['pagination'] = $this->pagination->create_links();

        sendTemplateView(1, 'pub/authors', $data);
    }

    public function affiliations()
    {
        // $data['title'] = 'Affiliations Data';

        $data['javascript_vendors'] = array('datatables/jquery.dataTables.min.js','datatables-bs4/js/dataTables.bootstrap4.min.js','sweetalert2/sweetalert2.min.js','chart.js/Chart.min.js', 'apex/apexcharts.min.js');
        $data['javascript'] = array('data-table.js');
        $data['javascript_controllers'] = array('dashboard_authors.js','pesan.js');

        // $data['aff'] = $this->dashboard->get_affiliations();
        $data['aff'] = $this->db->get('sinta_affiliations')->row_array();
        // print_r($data['aff']);
        // die;

        sendTemplateView(1, 'pub/affiliations', $data);
    }

}