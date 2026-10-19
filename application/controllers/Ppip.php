<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ppip_model', 'ppip_model');
    }

    public function index($section = '')
    {
        // 1. Ambil pengaturan & teks landing page dari basis data
        $settings = $this->ppip_model->get_settings();

        // 2. Ambil portal layanan dari basis data
        $portals = $this->ppip_model->get_portals();

        // 3. Ambil informasi & agenda dari basis data
        $agendas = $this->ppip_model->get_agendas();

        // 4. Ambil statistik kinerja terkini (live metrics) dari basis data
        $stats = $this->ppip_model->get_live_stats();

        $section_clean = strtolower(trim($section));
        $valid_sections = ['beranda', 'tentang', 'layanan', 'kinerja', 'informasi', 'kontak'];
        if (!in_array($section_clean, $valid_sections)) {
            $section_clean = 'beranda';
        }

        $data = [
            'title'          => $settings['hero_title'] . ' | ' . $settings['hero_badge'],
            'settings'       => $settings,
            'portals'        => $portals,
            'agendas'        => $agendas,
            'stats'          => $stats,
            'active_section' => $section_clean,
        ];

        $this->load->view('landing/index', $data);
    }

    public function sitemap()
    {
        $settings = $this->ppip_model->get_settings();
        $portals  = $this->ppip_model->get_portals();
        $agendas  = $this->ppip_model->get_agendas(10);
        $stats    = $this->ppip_model->get_live_stats();

        $data = [
            'title'    => 'Peta Situs (Sitemap) | ' . $settings['hero_title'],
            'settings' => $settings,
            'portals'  => $portals,
            'agendas'  => $agendas,
            'stats'    => $stats,
        ];

        $this->load->view('landing/sitemap', $data);
    }

    public function sitemap_xml()
    {
        $portals = $this->ppip_model->get_portals();
        
        $urls = [
            ['loc' => base_url('ppip'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['loc' => base_url('ppip#beranda'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => base_url('ppip#tentang'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => base_url('ppip#layanan'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => base_url('ppip#kinerja'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => base_url('ppip#informasi'), 'priority' => '0.8', 'changefreq' => 'daily'],
            ['loc' => base_url('ppip#kontak'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => base_url('sitemap'), 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['loc' => base_url('dashboard/authors'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => base_url('dashboard/scopus_sdgs'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => base_url('dashboard/scholar_sdgs'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => base_url('dashboard/jurnal_sinta'), 'priority' => '0.8', 'changefreq' => 'weekly'],
        ];

        $this->output
            ->set_content_type('text/xml')
            ->set_output($this->load->view('landing/sitemap_xml', ['urls' => $urls], TRUE));
    }
}
