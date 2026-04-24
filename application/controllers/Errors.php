<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Output $output
 */
class Errors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function page_missing()
    {
        $this->output->set_status_header('404');
        $data['title'] = "404 - Halaman Tidak Ditemukan";
        $this->load->view('errors/custom_404', $data);
    }
}
