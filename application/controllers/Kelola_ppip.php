<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_ppip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Ppip_model', 'ppip_model');
        $this->load->helper(['master', 'wpu']);
    }

    public function index()
    {
        redirect('kelola_ppip/portals');
    }

    // =========================================================================
    // 1. MANAJEMEN PORTAL LAYANAN
    // =========================================================================
    public function portals()
    {
        $data['title'] = 'Kelola Portal Layanan PPIP';
        $data['javascript_vendors'] = [
            'datatables/jquery.dataTables.min.js',
            'datatables-bs4/js/dataTables.bootstrap4.min.js',
            'sweetalert2/sweetalert2.min.js'
        ];
        $data['javascript'] = ['data-table.js'];
        $data['javascript_controllers'] = ['pesan.js'];

        $data['portals'] = $this->ppip_model->get_all_portals();

        sendTemplateView(1, 'admin_ppip/portals', $data);
    }

    public function save_portal()
    {
        $this->ppip_model->ensure_tables();

        $id = $this->input->post('id');

        $data = [
            'portal_name'  => trim($this->input->post('portal_name', true)),
            'subtitle'     => trim($this->input->post('subtitle', true)),
            'badge_tag'    => trim($this->input->post('badge_tag', true)),
            'description'  => trim($this->input->post('description', true)),
            'url'          => trim($this->input->post('url', true)),
            'button_text'  => trim($this->input->post('button_text', true)) ?: 'Kunjungi Portal',
            'domain_label' => trim($this->input->post('domain_label', true)),
            'icon_class'   => trim($this->input->post('icon_class', true)) ?: 'fas fa-globe',
            'color_theme'  => $this->input->post('color_theme', true) ?: 'green',
            'order_num'    => (int) $this->input->post('order_num', true),
            'is_active'    => $this->input->post('is_active') ? 1 : 0
        ];

        if (empty($data['domain_label']) && !empty($data['url'])) {
            $parsed = parse_url($data['url'], PHP_URL_HOST);
            $data['domain_label'] = $parsed ? $parsed : $data['url'];
        }

        if (!empty($id)) {
            $result = $this->ppip_model->update_portal($id, $data);
            if ($result) {
                $this->session->set_flashdata('flash', 'Data portal berhasil diperbarui!');
            } else {
                $err = $this->db->error();
                $msg = !empty($err['message']) ? $err['message'] : 'Gagal memperbarui database. Pastikan tabel ppip_portals sudah di-import.';
                $this->session->set_flashdata('flashsalah', $msg);
            }
        } else {
            $result = $this->ppip_model->insert_portal($data);
            if ($result) {
                $this->session->set_flashdata('flash', 'Portal baru berhasil ditambahkan!');
            } else {
                $err = $this->db->error();
                $msg = !empty($err['message']) ? $err['message'] : 'Gagal menambahkan data ke database. Pastikan tabel ppip_portals sudah di-import.';
                $this->session->set_flashdata('flashsalah', $msg);
            }
        }

        redirect('kelola_ppip/portals');
    }

    public function delete_portal($id)
    {
        $result = $this->ppip_model->delete_portal($id);
        if ($result) {
            $this->session->set_flashdata('flashsalah', 'Portal berhasil dihapus');
        } else {
            $err = $this->db->error();
            $this->session->set_flashdata('flashsalah', 'Gagal menghapus data: ' . ($err['message'] ?? 'Tabel tidak ditemukan'));
        }
        redirect('kelola_ppip/portals');
    }

    // =========================================================================
    // 2. MANAJEMEN AGENDA & INFORMASI
    // =========================================================================
    public function agenda()
    {
        $data['title'] = 'Kelola Informasi & Agenda PPIP';
        $data['javascript_vendors'] = [
            'datatables/jquery.dataTables.min.js',
            'datatables-bs4/js/dataTables.bootstrap4.min.js',
            'sweetalert2/sweetalert2.min.js'
        ];
        $data['javascript'] = ['data-table.js'];
        $data['javascript_controllers'] = ['pesan.js'];

        $data['agendas'] = $this->ppip_model->get_all_agendas();

        sendTemplateView(1, 'admin_ppip/agenda', $data);
    }

    public function save_agenda()
    {
        $this->ppip_model->ensure_tables();

        $id = $this->input->post('id');

        $data = [
            'title'          => trim($this->input->post('title', true)),
            'category'       => trim($this->input->post('category', true)) ?: 'Umum',
            'category_class' => trim($this->input->post('category_class', true)) ?: 'jurnal',
            'event_date'     => trim($this->input->post('event_date', true)),
            'description'    => trim($this->input->post('description', true)),
            'link_url'       => trim($this->input->post('link_url', true)) ?: '#',
            'link_text'      => trim($this->input->post('link_text', true)) ?: 'Baca Selengkapnya',
            'order_num'      => (int) $this->input->post('order_num', true),
            'is_active'      => $this->input->post('is_active') ? 1 : 0
        ];

        if (!empty($id)) {
            $result = $this->ppip_model->update_agenda($id, $data);
            if ($result) {
                $this->session->set_flashdata('flash', 'Agenda berhasil diperbarui!');
            } else {
                $err = $this->db->error();
                $this->session->set_flashdata('flashsalah', 'Gagal memperbarui agenda: ' . ($err['message'] ?? 'Periksa tabel database'));
            }
        } else {
            $result = $this->ppip_model->insert_agenda($data);
            if ($result) {
                $this->session->set_flashdata('flash', 'Agenda baru berhasil ditambahkan!');
            } else {
                $err = $this->db->error();
                $this->session->set_flashdata('flashsalah', 'Gagal menambahkan agenda: ' . ($err['message'] ?? 'Periksa tabel database'));
            }
        }

        redirect('kelola_ppip/agenda');
    }

    public function delete_agenda($id)
    {
        $result = $this->ppip_model->delete_agenda($id);
        if ($result) {
            $this->session->set_flashdata('flashsalah', 'Agenda berhasil dihapus');
        } else {
            $err = $this->db->error();
            $this->session->set_flashdata('flashsalah', 'Gagal menghapus data: ' . ($err['message'] ?? 'Periksa tabel database'));
        }
        redirect('kelola_ppip/agenda');
    }

    // =========================================================================
    // 3. PENGATURAN KONTEN PORTAL (SETTINGS)
    // =========================================================================
    public function settings()
    {
        $data['title'] = 'Pengaturan Konten Portal PPIP';
        $data['javascript_vendors'] = [
            'sweetalert2/sweetalert2.min.js'
        ];
        $data['javascript'] = [];
        $data['javascript_controllers'] = ['pesan.js'];

        if ($this->input->server('REQUEST_METHOD') === 'POST' || !empty($_POST) || $this->input->method() === 'post') {
            $this->ppip_model->ensure_tables();

            $post = !empty($_POST) ? $_POST : $this->input->post(null, true);
            $csrf_token = $this->security->get_csrf_token_name();
            $settings_to_update = [];
            foreach ($post as $key => $val) {
                if ($key !== $csrf_token && $key !== 'active_tab') {
                    $settings_to_update[$key] = trim($val);
                }
            }

            $result = $this->ppip_model->update_settings($settings_to_update);
            if ($result) {
                $this->session->set_flashdata('flash', 'Pengaturan landing page berhasil disimpan!');
            } else {
                $err = $this->db->error();
                $this->session->set_flashdata('flashsalah', 'Gagal menyimpan pengaturan: ' . ($err['message'] ?? 'Periksa tabel database'));
            }

            $active_tab = $this->input->post('active_tab');
            $tab_query = '';
            if (!empty($active_tab)) {
                $tab_clean = ltrim($active_tab, '#');
                $tab_query = '?tab=' . urlencode($tab_clean);
            }
            redirect('kelola_ppip/settings' . $tab_query);
            return;
        }

        $data['settings'] = $this->ppip_model->get_settings();

        sendTemplateView(1, 'admin_ppip/settings', $data);
    }
}
