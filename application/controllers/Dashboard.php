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
        $this->load->model('Master_model', 'master');
        $this->load->helper('master', 'master');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        // $data['javascript_vendors'] = array('datatables/jquery.dataTables.min.js','datatables-bs4/js/dataTables.bootstrap4.min.js','sweetalert2/sweetalert2.min.js','chart.js/Chart.min.js', 'apex/apexcharts.min.js');
        // $data['javascript'] = array('data-table.js');
        // $data['javascript_controllers'] = array('dashboard.js','pesan.js');

        $query = $this->db
                ->where('is_deleted', 0)
                ->get('sinta_authors');
        $data['lecturers'] = [];

        foreach ($query->result() as $row) {
            $data['lecturers'][] = [
                'id' => $row->id,
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

    // public function authors()
    // {
    //     $data['title'] = 'Authors Data';

    //     $data['javascript_vendors'] = array('datatables/jquery.dataTables.min.js','datatables-bs4/js/dataTables.bootstrap4.min.js','sweetalert2/sweetalert2.min.js','chart.js/Chart.min.js', 'apex/apexcharts.min.js');
    //     $data['javascript'] = array('data-table.js');
    //     $data['javascript_controllers'] = array('pesan.js');

    //     $query = $this->db->where('is_deleted', 0)
    //         ->order_by('name', 'ASC')
    //         ->get('sinta_authors');

    //     $data['lecturers'] = [];
    //     foreach ($query->result() as $r) {
    //         $data['lecturers'][] = [
    //             'id' => $r->id,
    //             'photo' => $r->photo,
    //             'nama' => $r->name,
    //             'dept' => $r->department,
    //             'score_all' => $r->score_overall,
    //             'score_3_years' => $r->score_3_years,
    //             'artikel_scholar' => $r->articles_scholar,
    //             'artikel_scopus' => $r->articles_scopus,
    //             'artikel_wos' => $r->articles_wos,
    //             'cit_scholar' => $r->citations_scholar,
    //             'cit_scopus' => $r->citations_scopus,
    //             'cit_wos' => $r->citations_wos,
    //             'subject' => explode(",", $r->subjects)
    //         ];
    //     }

    //     // $data['pagination'] = $this->pagination->create_links();

    //     sendTemplateView(1, 'pub/authors', $data);
    // }

    public function authors()
    {
        $data['title'] = 'Authors Data';
        $keyword = $this->input->get('q'); 
        $fakultas  = $this->input->get('fakultas');
        $prodi     = $this->input->get('prodi');
        $sort  = $this->input->get('sort');
        $order = $this->input->get('order') ?: 'desc';

        $this->load->library('pagination');

        // 1. Inisialisasi Query Dasar
        $this->db->from('sinta_authors');
        $this->db->where('is_deleted', 0);

        $allowed_sort = [
            'score_overall' => 'sinta_authors.score_overall',
            'score_3_years' => 'sinta_authors.score_3_years',
            'score_affiliation' => 'sinta_authors.score_affiliation',
            'score_affiliation_3_years' => 'sinta_authors.score_affiliation_3_years',
            'articles_scholar' => 'sinta_authors.articles_scholar',
            'articles_scopus' => 'sinta_authors.articles_scopus',
            'articles_wos' => 'sinta_authors.articles_wos',
            'citations_scholar' => 'sinta_authors.citations_scholar',
            'citations_scopus' => 'sinta_authors.citations_scopus',
            'citations_wos' => 'sinta_authors.citations_wos',
        ];
        if (!empty($sort) && isset($allowed_sort[$sort])) {
            $this->db->order_by($allowed_sort[$sort], $order);
        } else {
            $this->db->order_by('name', 'ASC');
        }                

        // 2. Terapkan Filter Pencarian jika ada
        if (!empty($keyword)) {
            $this->db->group_start();
                $this->db->like('name', $keyword);
                $this->db->or_like('department', $keyword);
                $this->db->or_like('subjects', $keyword);
            $this->db->group_end();
        }

        $this->db->join('mst_prodi', 'mst_prodi.id = sinta_authors.prodi_id', 'left');
        $this->db->join('mst_fakultas', 'mst_fakultas.fakultas_id = mst_prodi.fakultas_id', 'left');

        if (!empty($fakultas)) {
            $this->db->where('mst_fakultas.fakultas_id', $fakultas);
        }

        if (!empty($prodi)) {
            $this->db->where('mst_prodi.id', $prodi);
        }


        // 3. Hitung Total (Gunakan FALSE agar Query Builder TIDAK ter-reset)
        $total_rows = $this->db->count_all_results('', FALSE);

        // 4. Konfigurasi Pagination
        $config['base_url'] = site_url('dashboard/authors');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;
        $config['reuse_query_string'] = TRUE; // Penting agar keyword ?q= tetap ada

        // Styling Bootstrap 4
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        // 5. Eksekusi Query dengan Limit & Offset
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $query = $this->db->order_by('name', 'ASC')
                        ->limit($config['per_page'], $page)
                        ->get(); // Tidak perlu isi nama tabel lagi di sini

        // Assets
        $data['javascript_vendors'] = array('datatables/jquery.dataTables.min.js','datatables-bs4/js/dataTables.bootstrap4.min.js','sweetalert2/sweetalert2.min.js', 'apex/apexcharts.min.js', 'jquery/jquery.min.js', 'jquery/jquery.slim.js', 'jquery/jquery.slim.min.js');
        $data['javascript'] = array('data-table.js', 'adminlte.min.js');
        $data['javascript_controllers'] = array('pesan.js');
        $data['fakultas_list'] = $this->master->getFakultas();
        $data['prodi_list'] = $this->master->getProdi();

        // Data Processing
        $data['lecturers'] = [];
        foreach ($query->result() as $r) {
            $data['lecturers'][] = [
                'id' => $r->id,
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
                'subject' => explode(",", $r->subjects),
                'prodi_id' => $r->prodi_id
            ];
        }

        $data['pagination'] = $this->pagination->create_links();
        $data['selected_fakultas'] = $fakultas;
        $data['selected_prodi']    = $prodi;
        $data['keyword'] = $keyword;
        $data['sort']  = $sort;
        $data['order'] = $order;

        sendTemplateView(1, 'pub/authors', $data);
    }

    public function affiliations()
    {
        // $data['title'] = 'Affiliations Data';

        $data['javascript_vendors'] = array('datatables/jquery.dataTables.min.js','datatables-bs4/js/dataTables.bootstrap4.min.js','sweetalert2/sweetalert2.min.js','chart.js/Chart.min.js', 'apex/apexcharts.min.js');
        $data['javascript'] = array('data-table.js');
        $data['javascript_controllers'] = array('pesan.js');

        // artikel per prodi
        $data['prodi_articles'] = $this->db
                                ->select('
                                    p.nama_program_studi AS prodi,
                                    p.id_jenjang_pendidikan AS jenjang,
                                    p.nama_jenjang_pendidikan AS jenjang_name,
                                    COALESCE(SUM(au.articles_scopus),0)  AS scopus,
                                    COALESCE(SUM(au.articles_scholar),0) AS scholar,
                                    COALESCE(SUM(au.articles_wos),0)     AS wos
                                ')
                                ->from('mst_prodi p')
                                ->join(
                                    'sinta_authors au',
                                    'au.prodi_id = p.id AND au.is_deleted = 0',
                                    'left'
                                )
                                ->group_by('p.id, p.id_jenjang_pendidikan')
                                ->order_by('p.id_jenjang_pendidikan, p.nama_program_studi', 'ASC')
                                ->get()
                                ->result_array();


        // print_r($data['prodi_articles']);
        // die;

        $data['fakultas_articles'] = $this->db
                                    ->select('
                                        f.fakultas_name AS fakultas,
                                        COALESCE(SUM(au.articles_scopus), 0)  AS scopus,
                                        COALESCE(SUM(au.articles_scholar), 0) AS scholar,
                                        COALESCE(SUM(au.articles_wos), 0)     AS wos
                                    ')
                                    ->from('mst_fakultas f')
                                    ->join(
                                        'mst_prodi p',
                                        'p.fakultas_id = f.fakultas_id',
                                        'left'
                                    )
                                    ->join(
                                        'sinta_authors au',
                                        'au.prodi_id = p.id AND au.is_deleted = 0',
                                        'left'
                                    )
                                    ->group_by('f.fakultas_id')
                                    ->order_by('f.fakultas_name', 'ASC')
                                    ->get()
                                    ->result_array();
        // print_r($data['fakultas_articles']);
        // die;

        // $data['aff'] = $this->db->get('sinta_affiliations')->row_array();
        $data['aff'] = $this->db->select('a.*, au.name, au.department, au.photo, au.prodi_id')
                        ->from('sinta_affiliations a')
                        ->join(
                            'sinta_authors au',
                            'au.id = a.id AND au.is_deleted = 0',
                            'left'
                        )
                        ->get()
                        ->row_array();


        // print_r($data['prodi']);
        // die;

        sendTemplateView(1, 'pub/affiliations', $data);
    }

    public function detail($id)
    {
        // Assets
        $data['javascript_vendors'] = array('datatables/jquery.dataTables.min.js','datatables-bs4/js/dataTables.bootstrap4.min.js','sweetalert2/sweetalert2.min.js', 'apex/apexcharts.min.js', 'jquery/jquery.min.js', 'jquery/jquery.slim.js', 'jquery/jquery.slim.min.js');
        $data['javascript'] = array('data-table.js', 'adminlte.min.js', 'popper.min.js');
        $data['javascript_controllers'] = array('pesan.js');
        
        // print_r($data['javascript_vendors']);
        // die;
        $data['author'] = $this->dashboard->getDetailAuthor($id);
        $data['result'] = $this->dashboard->getScopusArticlesByAuthor($id);
        $data['result2'] = $this->dashboard->getScholarArticlesByAuthor($id);
        // $data['citations_per_year'] = $this->dashboard->getCitationsPerYear($id);
        // print_r($data['result2']);
        // die;
        if (!$data['author']) {
            show_404();
        }

        sendTemplateView(1, 'pub/detailAuthor', $data);
        // $this->load->view('pub/detailAuthor', $data);
    }

}