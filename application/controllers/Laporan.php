<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
require 'vendor/autoload.php';
class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Tes_model', 'tes');
        $this->load->model('Master_model', 'master');
        $this->load->helper('master', 'master');
    }

    public function cetakKepribadian()
    {
        $data['tgl_awal']  = $this->input->get('dari');
        $data['tgl_akhir'] = $this->input->get('sampai');
        $data['title'] = 'Hasil Tes Kepribadian';

        $data['result'] = $this->tes->getKepribadianRange($data['tgl_awal'], $data['tgl_akhir']);
        // print_r($data['result']); exit;
        // die;
        

        // tampilkan ke view cetak
        $this->load->view('laporan/cetak_kepribadian', $data);
    }

    public function cetakEmosional()
    {
        $data['tgl_awal']  = $this->input->get('dari');
        $data['tgl_akhir'] = $this->input->get('sampai');
        $data['title'] = 'Hasil Tes Emosional';

        $data['result'] = $this->tes->getEmosionalRange($data['tgl_awal'], $data['tgl_akhir']);
        // print_r($data['result']); exit;
        // die;
        

        // tampilkan ke view cetak
        $this->load->view('laporan/cetak_emosional', $data);
    }

    public function cetakLvi()
    {
        $data['tgl_awal']  = $this->input->get('dari');
        $data['tgl_akhir'] = $this->input->get('sampai');
        $data['title'] = 'Hasil Tes Loneliness Vulnerability Index';

        $data['result'] = $this->tes->getLviRange($data['tgl_awal'], $data['tgl_akhir']);
        // print_r($data['result']); exit;
        // die;
        

        // tampilkan ke view cetak
        $this->load->view('laporan/cetak_lvi', $data);
    }

    public function cetakKesiapankerja()
    {
        $data['tgl_awal']  = $this->input->get('dari');
        $data['tgl_akhir'] = $this->input->get('sampai');
        $data['title'] = 'Hasil Tes Kesiapan Kerja';

        $data['result'] = $this->tes->getKesiapankerjaRange($data['tgl_awal'], $data['tgl_akhir']);
        // print_r($data['result']); exit;
        // die;
        

        // tampilkan ke view cetak
        $this->load->view('laporan/cetak_kesiapankerja', $data);
    }

    public function cetakKepribadiankarir()
    {
        $data['tgl_awal']  = $this->input->get('dari');
        $data['tgl_akhir'] = $this->input->get('sampai');
        $data['title'] = 'Hasil Tes Kesiapan Kerja';

        $data['result'] = $this->tes->getKepribadiankarirRange($data['tgl_awal'], $data['tgl_akhir']);
        // print_r($data['result']); exit;
        // die;
        

        // tampilkan ke view cetak
        $this->load->view('laporan/cetak_kepribadiankarir', $data);
    }

    public function cetakKeterampilandankemampuankerja()
    {
        $data['tgl_awal']  = $this->input->get('dari');
        $data['tgl_akhir'] = $this->input->get('sampai');
        $data['title'] = 'Hasil Tes Keterampilan dan Kemampuan Kerja';

        $data['result'] = $this->tes->getKeterampilandankemampuankerjaRange($data['tgl_awal'], $data['tgl_akhir']);
        // print_r($data['result']); exit;
        // die;
        

        // tampilkan ke view cetak
        $this->load->view('laporan/cetak_keterampilandankemampuankerja', $data);
    }

}