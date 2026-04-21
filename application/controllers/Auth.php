<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // ini digunakan untuk php 8.0 ke atas
    
    // public $benchmark; // Tambahkan ini
    // public $utf8 ; // Tambahkan ini
    // public $log; // Tambahkan ini
    // public $config; // Tambahkan ini
    // public $hooks; // Tambahkan ini
    // public $uri; // Tambahkan ini
    // public $router; // Tambahkan ini
    // public $output; // Tambahkan ini
    // public $security; // Tambahkan ini
    // public $input; // Tambahkan ini
    // public $lang; // Tambahkan ini
    // public $db; // Tambahkan ini
    // public $failover; // Tambahkan ini
    // public $session;
    // public $form_validation; // Tambahkan ini

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login';

        $data['javascript_vendors'] = array('jquery/jquery.min.js','bootstrap/js/bootstrap.bundle.min.js','sweetalert2/sweetalert2.min.js');
        $data['javascript'] = array('js/adminlte.min.js');
        $data['javascript_controllers'] = array('pesan.js');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


            if($this->form_validation->run() == false){
                sendTemplateView(2, 'auth/login', $data);
            }else{
                $this->log_in();
            }
        
        
    }

    public function log_in()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $username])->row_array();

            if ($user && password_verify($password, $user['password'])) {
                $data = [
                    'id' => $user['id'],
                    'username' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);

                $this->session->set_flashdata('flash', 'Selamat datang di UIN Saizu Purwokerto');
                // sendTemplateView(1, 'dashboard/authors', $data);
                redirect('dashboard');
                
            } 
            else {
                $this->session->set_flashdata('flashsalah', 'username / password yang anda masukan salah');
                redirect('auth');
            }
    }

    public function log_out()
    {
        $this->session->unset_userdata('id');
        unset($_SESSION['id']);

        $this->session->set_flashdata('flashinfo', 'Sesi berakhir, anda telah logout');
        session_destroy(); // pastikan session PHP ikut hilang

        redirect('dashboard/authors');
    }

    
}