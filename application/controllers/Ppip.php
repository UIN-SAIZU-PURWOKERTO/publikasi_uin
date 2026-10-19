<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ppip_model', 'ppip_model');
    }

    public function index()
    {
        // 1. Ambil pengaturan & teks landing page dari basis data
        $settings = $this->ppip_model->get_settings();

        // 2. Ambil portal layanan dari basis data
        $portals = $this->ppip_model->get_portals();

        // 3. Ambil informasi & agenda dari basis data
        $agendas = $this->ppip_model->get_agendas();

        // 4. Ambil statistik kinerja terkini (live metrics) dari basis data
        $stats = $this->ppip_model->get_live_stats();

        $data = [
            'title'    => $settings['hero_title'] . ' | ' . $settings['hero_badge'],
            'settings' => $settings,
            'portals'  => $portals,
            'agendas'  => $agendas,
            'stats'    => $stats,
        ];

        $this->load->view('landing/index', $data);
    }
}
