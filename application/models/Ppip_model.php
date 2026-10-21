<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppip_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->ensure_tables();
    }

    public function __isset($key)
    {
        return isset(get_instance()->$key);
    }

    /**
     * Pastikan tabel-tabel PPIP tersedia di database,
     * jika belum ada maka otomatis dibuat beserta seed datanya (self-healing).
     */
    public function ensure_tables()
    {
        if (!$this->db || !$this->db->conn_id) {
            return;
        }

        $default_settings = [
            ['setting_key' => 'hero_badge', 'setting_value' => 'LPPM UIN Saizu Purwokerto'],
            ['setting_key' => 'hero_title', 'setting_value' => 'Pusat Publikasi Ilmiah dan Penerbitan'],
            ['setting_key' => 'hero_subtitle', 'setting_value' => 'LPPM UIN Prof. K.H. Saifuddin Zuhri Purwokerto'],
            ['setting_key' => 'hero_tagline', 'setting_value' => 'Menguatkan Publikasi, Menghubungkan Gagasan, Memperluas Manfaat Pengetahuan'],
            ['setting_key' => 'hero_description', 'setting_value' => 'Pusat Publikasi Ilmiah dan Penerbitan (PPIP) mendukung pengembangan dan penyebarluasan karya akademik melalui penguatan tata kelola jurnal, penerbitan buku, penyelenggaraan konferensi ilmiah, dan penerbitan prosiding. Kami membangun ruang kolaborasi agar pengetahuan dapat dikembangkan, dipertukarkan, dan dimanfaatkan secara lebih luas.'],
            ['setting_key' => 'about_badge', 'setting_value' => 'Tentang Kami'],
            ['setting_key' => 'about_title', 'setting_value' => 'Pusat Publikasi Ilmiah dan Penerbitan (PPIP)'],
            ['setting_key' => 'about_p1', 'setting_value' => 'Pusat Publikasi Ilmiah dan Penerbitan (PPIP) merupakan pusat di lingkungan Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) UIN Prof. K.H. Saifuddin Zuhri Purwokerto yang mendukung pengembangan ekosistem publikasi ilmiah dan penerbitan universitas.'],
            ['setting_key' => 'about_p2', 'setting_value' => 'PPIP menaungi Griya Jurnal sebagai penggerak koordinasi dan penguatan tata kelola jurnal ilmiah di lingkungan UIN Saizu Purwokerto, serta Saizu Publisher sebagai layanan penerbitan buku. PPIP juga menyediakan layanan penyelenggaraan konferensi ilmiah nasional dan internasional serta penerbitan prosiding sebagai sarana pertukaran gagasan dan penyebarluasan hasil penelitian.'],
            ['setting_key' => 'about_p3', 'setting_value' => 'Melalui sinergi layanan tersebut, PPIP mendukung dosen, peneliti, mahasiswa, penulis, dan pengelola publikasi dalam menghasilkan serta menyebarluaskan karya yang bermutu dan berintegritas. Penyajian data kinerja publikasi turut dikembangkan untuk memperkenalkan kepakaran, mendukung evaluasi, dan membuka peluang kolaborasi akademik.'],
            ['setting_key' => 'performance_badge', 'setting_value' => 'Data & Kepakaran'],
            ['setting_key' => 'performance_title', 'setting_value' => 'Kinerja Publikasi Sivitas Akademika'],
            ['setting_key' => 'performance_lead', 'setting_value' => 'Kenali kepakaran dan kontribusi akademik sivitas UIN Saizu Purwokerto melalui direktori akademisi serta informasi publikasi dan sitasi. Jelajahi karya ilmiah untuk menemukan bidang penelitian, memahami perkembangan publikasi, dan membuka peluang kerja sama.'],
            ['setting_key' => 'agenda_badge', 'setting_value' => 'Kabar & Pengumuman'],
            ['setting_key' => 'agenda_title', 'setting_value' => 'Informasi dan Agenda'],
            ['setting_key' => 'agenda_lead', 'setting_value' => 'Temukan berita kegiatan, pengumuman layanan, agenda konferensi, pelatihan publikasi, pendampingan jurnal, serta informasi penerbitan buku dan prosiding.'],
            ['setting_key' => 'cta_title', 'setting_value' => 'Kembangkan Karya dan Kolaborasi Bersama PPIP'],
            ['setting_key' => 'cta_description', 'setting_value' => 'Temukan layanan yang sesuai dengan kebutuhan publikasi, penerbitan, dan kegiatan ilmiah Anda. Hubungi PPIP untuk memperoleh informasi lebih lanjut dan menjajaki peluang kolaborasi.'],
            ['setting_key' => 'contact_address', 'setting_value' => 'Gedung LPPM Lt. 2, Kampus UIN Prof. K.H. Saifuddin Zuhri, Jl. A. Yani No. 40A, Purwokerto, Jawa Tengah 53126'],
            ['setting_key' => 'contact_email', 'setting_value' => 'ppip@uinsaizu.ac.id'],
            ['setting_key' => 'contact_phone', 'setting_value' => '0281-635624'],
            ['setting_key' => 'contact_hours', 'setting_value' => 'Senin - Jumat | 08.00 - 16.00 WIB'],
            ['setting_key' => 'manual_books_count', 'setting_value' => '150'],
            ['setting_key' => 'manual_proceedings_count', 'setting_value' => '12'],
        ];

        $default_portals = [
            [
                'id' => 1,
                'portal_name' => 'Griya Jurnal',
                'subtitle' => 'Penguatan Tata Kelola Jurnal',
                'badge_tag' => 'OJS & Akreditasi SINTA',
                'description' => 'Griya Jurnal menjadi wadah koordinasi, pembinaan, dan pengembangan jurnal ilmiah di lingkungan UIN Saizu Purwokerto. Melalui kolaborasi dengan para pengelola jurnal, Griya Jurnal mendorong peningkatan kualitas artikel, profesionalitas pengelolaan editorial, penerapan etika publikasi, serta pengembangan akreditasi dan indeksasi.',
                'url' => 'https://ejournal.uinsaizu.ac.id',
                'button_text' => 'Kunjungi Griya Jurnal',
                'domain_label' => 'ejournal.uinsaizu.ac.id',
                'icon_class' => 'fas fa-newspaper',
                'color_theme' => 'green',
                'order_num' => 1,
                'is_active' => 1
            ],
            [
                'id' => 2,
                'portal_name' => 'Saizu Publisher',
                'subtitle' => 'Penerbitan Buku',
                'badge_tag' => 'ISBN & Katalog Karya',
                'description' => 'Saizu Publisher memfasilitasi penerbitan buku sebagai sarana pengembangan ilmu pengetahuan, pengayaan sumber pembelajaran, dan penyebarluasan gagasan. Penulis dan pembaca dapat mengakses informasi penerbitan serta menelusuri katalog karya melalui portal Saizu Publisher.',
                'url' => 'https://books.uinsaizu.ac.id',
                'button_text' => 'Kunjungi Saizu Publisher',
                'domain_label' => 'books.uinsaizu.ac.id',
                'icon_class' => 'fas fa-book-reader',
                'color_theme' => 'gold',
                'order_num' => 2,
                'is_active' => 1
            ],
            [
                'id' => 3,
                'portal_name' => 'Konferensi Ilmiah',
                'subtitle' => 'Pertukaran Gagasan dan Kolaborasi',
                'badge_tag' => 'Forum Nasional & Internasional',
                'description' => 'Layanan konferensi ilmiah mendukung penyelenggaraan forum akademik berskala nasional dan internasional. Melalui forum ini, peneliti, akademisi, dan praktisi dapat mempresentasikan hasil penelitian, mendiskusikan perkembangan keilmuan, serta membangun jejaring kolaborasi.',
                'url' => 'https://conferences.uinsaizu.ac.id',
                'button_text' => 'Jelajahi Konferensi',
                'domain_label' => 'conferences.uinsaizu.ac.id',
                'icon_class' => 'fas fa-chalkboard-teacher',
                'color_theme' => 'blue',
                'order_num' => 3,
                'is_active' => 1
            ],
            [
                'id' => 4,
                'portal_name' => 'Prosiding',
                'subtitle' => 'Dokumentasi dan Penyebarluasan Karya Ilmiah',
                'badge_tag' => 'Open Access & Repositori',
                'description' => 'Layanan prosiding mendukung penerbitan dan penyebarluasan makalah dari kegiatan ilmiah. Portal prosiding menjadi sarana untuk menelusuri karya yang dipresentasikan dalam forum akademik, sehingga gagasan dan hasil penelitian dapat diakses serta dipelajari lebih lanjut.',
                'url' => 'https://proceedings.uinsaizu.ac.id',
                'button_text' => 'Jelajahi Prosiding',
                'domain_label' => 'proceedings.uinsaizu.ac.id',
                'icon_class' => 'fas fa-scroll',
                'color_theme' => 'purple',
                'order_num' => 4,
                'is_active' => 1
            ]
        ];

        $default_agendas = [
            [
                'id' => 1,
                'title' => 'Workshop Akselerasi Akreditasi Jurnal Ilmiah Menuju SINTA 2',
                'category' => 'Jurnal',
                'category_class' => 'jurnal',
                'event_date' => 'Terjadwal 2026',
                'description' => 'Pendampingan intensif bagi para pengelola jurnal di lingkungan UIN Saizu dalam pemenuhan standar tata kelola editorial dan etika publikasi.',
                'link_url' => '#',
                'link_text' => 'Baca Selengkapnya',
                'order_num' => 1,
                'is_active' => 1
            ],
            [
                'id' => 2,
                'title' => 'Call for Book Chapters & Monograf Saizu Publisher',
                'category' => 'Penerbitan',
                'category_class' => 'buku',
                'event_date' => 'Buka Setiap Saat',
                'description' => 'Peluang penerbitan buku ajar, buku referensi, dan monograf ber-ISBN bagi para dosen dan peneliti dengan proses review profesional.',
                'link_url' => '#',
                'link_text' => 'Pedoman Penulisan',
                'order_num' => 2,
                'is_active' => 1
            ],
            [
                'id' => 3,
                'title' => 'International Conference on Islamic Studies and Science',
                'category' => 'Konferensi',
                'category_class' => 'konferensi',
                'event_date' => 'Tahunan',
                'description' => 'Forum akademik internasional untuk mendiskusikan integrasi keilmuan Islam, sains, dan teknologi dengan publikasi prosiding terindeks.',
                'link_url' => '#',
                'link_text' => 'Jadwal & Call for Papers',
                'order_num' => 3,
                'is_active' => 1
            ]
        ];

        try {
            // 1. Tabel ppip_settings
            if (!$this->db->table_exists('ppip_settings')) {
                $this->db->query("CREATE TABLE IF NOT EXISTS `ppip_settings` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `setting_key` varchar(100) NOT NULL,
                    `setting_value` text,
                    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`id`),
                    UNIQUE KEY `idx_setting_key` (`setting_key`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            }
            if ($this->db->table_exists('ppip_settings') && $this->db->count_all('ppip_settings') == 0) {
                $this->db->insert_batch('ppip_settings', $default_settings);
            }

            // 2. Tabel ppip_portals
            if (!$this->db->table_exists('ppip_portals')) {
                $this->db->query("CREATE TABLE IF NOT EXISTS `ppip_portals` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `portal_name` varchar(150) NOT NULL,
                    `subtitle` varchar(255) DEFAULT NULL,
                    `badge_tag` varchar(100) DEFAULT NULL,
                    `description` text,
                    `url` varchar(255) NOT NULL,
                    `button_text` varchar(100) DEFAULT 'Kunjungi Portal',
                    `domain_label` varchar(100) DEFAULT NULL,
                    `icon_class` varchar(100) DEFAULT 'fas fa-globe',
                    `color_theme` varchar(50) DEFAULT 'green',
                    `order_num` int(11) DEFAULT 0,
                    `is_active` tinyint(1) DEFAULT 1,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            }
            if ($this->db->table_exists('ppip_portals') && $this->db->count_all('ppip_portals') == 0) {
                $this->db->insert_batch('ppip_portals', $default_portals);
            }

            // 3. Tabel ppip_agenda
            if (!$this->db->table_exists('ppip_agenda')) {
                $this->db->query("CREATE TABLE IF NOT EXISTS `ppip_agenda` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `title` varchar(255) NOT NULL,
                    `category` varchar(100) DEFAULT 'Umum',
                    `category_class` varchar(50) DEFAULT 'jurnal',
                    `event_date` varchar(100) DEFAULT NULL,
                    `description` text,
                    `link_url` varchar(255) DEFAULT '#',
                    `link_text` varchar(100) DEFAULT 'Baca Selengkapnya',
                    `order_num` int(11) DEFAULT 0,
                    `is_active` tinyint(1) DEFAULT 1,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            }
            if ($this->db->table_exists('ppip_agenda') && $this->db->count_all('ppip_agenda') == 0) {
                $this->db->insert_batch('ppip_agenda', $default_agendas);
            }
        } catch (Exception $e) {
            log_message('error', 'PPIP ensure_tables error: ' . $e->getMessage());
        }
    }

    /**
     * Ambil semua konfigurasi / teks landing page dari basis data
     */
    public function get_settings()
    {
        $settings = [];
        if ($this->db && $this->db->conn_id && $this->db->table_exists('ppip_settings')) {
            $rows = $this->db->get('ppip_settings')->result_array();
            foreach ($rows as $row) {
                $settings[$row['setting_key']] = $row['setting_value'];
            }
        }

        // Default fallbacks jika tabel belum ada atau record belum lengkap
        $defaults = [
            'hero_badge'        => 'LPPM UIN Saizu Purwokerto',
            'hero_title'        => 'Pusat Publikasi Ilmiah dan Penerbitan',
            'hero_subtitle'     => 'LPPM UIN Prof. K.H. Saifuddin Zuhri Purwokerto',
            'hero_tagline'      => 'Menguatkan Publikasi, Menghubungkan Gagasan, Memperluas Manfaat Pengetahuan',
            'hero_description'  => 'Pusat Publikasi Ilmiah dan Penerbitan (PPIP) mendukung pengembangan dan penyebarluasan karya akademik melalui penguatan tata kelola jurnal, penerbitan buku, penyelenggaraan konferensi ilmiah, dan penerbitan prosiding. Kami membangun ruang kolaborasi agar pengetahuan dapat dikembangkan, dipertukarkan, dan dimanfaatkan secara lebih luas.',
            'about_badge'       => 'Tentang Kami',
            'about_title'       => 'Pusat Publikasi Ilmiah dan Penerbitan (PPIP)',
            'about_p1'          => 'Pusat Publikasi Ilmiah dan Penerbitan (PPIP) merupakan pusat di lingkungan Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) UIN Prof. K.H. Saifuddin Zuhri Purwokerto yang mendukung pengembangan ekosistem publikasi ilmiah dan penerbitan universitas.',
            'about_p2'          => 'PPIP menaungi Griya Jurnal sebagai penggerak koordinasi dan penguatan tata kelola jurnal ilmiah di lingkungan UIN Saizu Purwokerto, serta Saizu Publisher sebagai layanan penerbitan buku. PPIP juga menyediakan layanan penyelenggaraan konferensi ilmiah nasional dan internasional serta penerbitan prosiding sebagai sarana pertukaran gagasan dan penyebarluasan hasil penelitian.',
            'about_p3'          => 'Melalui sinergi layanan tersebut, PPIP mendukung dosen, peneliti, mahasiswa, penulis, dan pengelola publikasi dalam menghasilkan serta menyebarluaskan karya yang bermutu dan berintegritas. Penyajian data kinerja publikasi turut dikembangkan untuk memperkenalkan kepakaran, mendukung evaluasi, dan membuka peluang kolaborasi akademik.',
            'performance_badge' => 'Data & Kepakaran',
            'performance_title' => 'Kinerja Publikasi Sivitas Akademika',
            'performance_lead'  => 'Kenali kepakaran dan kontribusi akademik sivitas UIN Saizu Purwokerto melalui direktori akademisi serta informasi publikasi dan sitasi. Jelajahi karya ilmiah untuk menemukan bidang penelitian, memahami perkembangan publikasi, dan membuka peluang kerja sama.',
            'agenda_badge'      => 'Kabar & Pengumuman',
            'agenda_title'      => 'Informasi dan Agenda',
            'agenda_lead'       => 'Temukan berita kegiatan, pengumuman layanan, agenda konferensi, pelatihan publikasi, pendampingan jurnal, serta informasi penerbitan buku dan prosiding.',
            'cta_title'         => 'Kembangkan Karya dan Kolaborasi Bersama PPIP',
            'cta_description'   => 'Temukan layanan yang sesuai dengan kebutuhan publikasi, penerbitan, dan kegiatan ilmiah Anda. Hubungi PPIP untuk memperoleh informasi lebih lanjut dan menjajaki peluang kolaborasi.',
            'contact_address'   => 'Gedung LPPM Lt. 2, Kampus UIN Prof. K.H. Saifuddin Zuhri, Jl. A. Yani No. 40A, Purwokerto, Jawa Tengah 53126',
            'contact_email'     => 'ppip@uinsaizu.ac.id',
            'contact_phone'     => '0281-635624',
            'contact_hours'     => 'Senin - Jumat | 08.00 - 16.00 WIB',
            'manual_books_count'        => '150',
            'manual_proceedings_count'  => '12'
        ];

        return array_merge($defaults, $settings);
    }

    /**
     * Ambil data portal layanan aktif dari basis data
     */
    public function get_portals()
    {
        if ($this->db && $this->db->conn_id && $this->db->table_exists('ppip_portals')) {
            $this->db->where('is_active', 1);
            $this->db->order_by('order_num', 'ASC');
            $rows = $this->db->get('ppip_portals')->result_array();
            if (!empty($rows)) {
                return $rows;
            }
        }

        // Fallback default
        return [
            [
                'id' => 1,
                'portal_name' => 'Griya Jurnal',
                'subtitle' => 'Penguatan Tata Kelola Jurnal',
                'badge_tag' => 'OJS & Akreditasi SINTA',
                'description' => 'Griya Jurnal menjadi wadah koordinasi, pembinaan, dan pengembangan jurnal ilmiah di lingkungan UIN Saizu Purwokerto. Melalui kolaborasi dengan para pengelola jurnal, Griya Jurnal mendorong peningkatan kualitas artikel, profesionalitas pengelolaan editorial, penerapan etika publikasi, serta pengembangan akreditasi dan indeksasi.',
                'url' => 'https://ejournal.uinsaizu.ac.id',
                'button_text' => 'Kunjungi Griya Jurnal',
                'domain_label' => 'ejournal.uinsaizu.ac.id',
                'icon_class' => 'fas fa-newspaper',
                'color_theme' => 'green',
                'order_num' => 1,
                'is_active' => 1
            ],
            [
                'id' => 2,
                'portal_name' => 'Saizu Publisher',
                'subtitle' => 'Penerbitan Buku',
                'badge_tag' => 'ISBN & Katalog Karya',
                'description' => 'Saizu Publisher memfasilitasi penerbitan buku sebagai sarana pengembangan ilmu pengetahuan, pengayaan sumber pembelajaran, dan penyebarluasan gagasan. Penulis dan pembaca dapat mengakses informasi penerbitan serta menelusuri katalog karya melalui portal Saizu Publisher.',
                'url' => 'https://books.uinsaizu.ac.id',
                'button_text' => 'Kunjungi Saizu Publisher',
                'domain_label' => 'books.uinsaizu.ac.id',
                'icon_class' => 'fas fa-book-reader',
                'color_theme' => 'gold',
                'order_num' => 2,
                'is_active' => 1
            ],
            [
                'id' => 3,
                'portal_name' => 'Konferensi Ilmiah',
                'subtitle' => 'Pertukaran Gagasan dan Kolaborasi',
                'badge_tag' => 'Forum Nasional & Internasional',
                'description' => 'Layanan konferensi ilmiah mendukung penyelenggaraan forum akademik berskala nasional dan internasional. Melalui forum ini, peneliti, akademisi, dan praktisi dapat mempresentasikan hasil penelitian, mendiskusikan perkembangan keilmuan, serta membangun jejaring kolaborasi.',
                'url' => 'https://conferences.uinsaizu.ac.id',
                'button_text' => 'Jelajahi Konferensi',
                'domain_label' => 'conferences.uinsaizu.ac.id',
                'icon_class' => 'fas fa-chalkboard-teacher',
                'color_theme' => 'blue',
                'order_num' => 3,
                'is_active' => 1
            ],
            [
                'id' => 4,
                'portal_name' => 'Prosiding',
                'subtitle' => 'Dokumentasi dan Penyebarluasan Karya Ilmiah',
                'badge_tag' => 'Open Access & Repositori',
                'description' => 'Layanan prosiding mendukung penerbitan dan penyebarluasan makalah dari kegiatan ilmiah. Portal prosiding menjadi sarana untuk menelusuri karya yang dipresentasikan dalam forum akademik, sehingga gagasan dan hasil penelitian dapat diakses serta dipelajari lebih lanjut.',
                'url' => 'https://proceedings.uinsaizu.ac.id',
                'button_text' => 'Jelajahi Prosiding',
                'domain_label' => 'proceedings.uinsaizu.ac.id',
                'icon_class' => 'fas fa-scroll',
                'color_theme' => 'purple',
                'order_num' => 4,
                'is_active' => 1
            ]
        ];
    }

    /**
     * Ambil data agenda dan pengumuman aktif dari basis data
     */
    public function get_agendas($limit = 6)
    {
        if ($this->db && $this->db->conn_id && $this->db->table_exists('ppip_agenda')) {
            $this->db->where('is_active', 1);
            $this->db->order_by('order_num', 'ASC');
            if ($limit) {
                $this->db->limit($limit);
            }
            $rows = $this->db->get('ppip_agenda')->result_array();
            if (!empty($rows)) {
                return $rows;
            }
        }

        // Fallback default
        return [
            [
                'id' => 1,
                'title' => 'Workshop Akselerasi Akreditasi Jurnal Ilmiah Menuju SINTA 2',
                'category' => 'Jurnal',
                'category_class' => 'jurnal',
                'event_date' => 'Terjadwal 2026',
                'description' => 'Pendampingan intensif bagi para pengelola jurnal di lingkungan UIN Saizu dalam pemenuhan standar tata kelola editorial dan etika publikasi.',
                'link_url' => '#',
                'link_text' => 'Baca Selengkapnya',
                'order_num' => 1,
                'is_active' => 1
            ],
            [
                'id' => 2,
                'title' => 'Call for Book Chapters & Monograf Saizu Publisher',
                'category' => 'Penerbitan',
                'category_class' => 'buku',
                'event_date' => 'Buka Setiap Saat',
                'description' => 'Peluang penerbitan buku ajar, buku referensi, dan monograf ber-ISBN bagi para dosen dan peneliti dengan proses review profesional.',
                'link_url' => '#',
                'link_text' => 'Pedoman Penulisan',
                'order_num' => 2,
                'is_active' => 1
            ],
            [
                'id' => 3,
                'title' => 'International Conference on Islamic Studies and Science',
                'category' => 'Konferensi',
                'category_class' => 'konferensi',
                'event_date' => 'Tahunan',
                'description' => 'Forum akademik internasional untuk mendiskusikan integrasi keilmuan Islam, sains, dan teknologi dengan publikasi prosiding terindeks.',
                'link_url' => '#',
                'link_text' => 'Jadwal & Call for Papers',
                'order_num' => 3,
                'is_active' => 1
            ]
        ];
    }

    /**
     * Hitung statistik hidup (live metric) yang bersumber langsung dari tabel database
     */
    public function get_live_stats()
    {
        $stats = [
            'total_journals'    => 28,
            'total_authors'     => 350,
            'total_books'       => 150,
            'total_proceedings' => 12,
            'total_scopus'      => 0,
            'total_scholar'     => 0
        ];

        if (!$this->db || !$this->db->conn_id) {
            return $stats;
        }

        try {
            // 1. Total Jurnal Ilmiah Aktif
            if ($this->db->table_exists('jurnal')) {
                $j_count = $this->db->where('is_delete', 0)->count_all_results('jurnal');
                if ($j_count > 0) {
                    $stats['total_journals'] = $j_count;
                }
            }

            // 2. Total Author / Sivitas Terdaftar
            if ($this->db->table_exists('sinta_authors')) {
                $a_count = $this->db->where('is_deleted', 0)->count_all_results('sinta_authors');
                if ($a_count > 0) {
                    $stats['total_authors'] = $a_count;
                }
            }

            // 3. Total Scopus Publications
            if ($this->db->table_exists('scopus_publications')) {
                $stats['total_scopus'] = $this->db->count_all('scopus_publications');
            }

            // 4. Total Scholar Publications
            if ($this->db->table_exists('scholar_publications')) {
                $stats['total_scholar'] = $this->db->count_all('scholar_publications');
            }

            // 5. Total Buku & Prosiding dari Settings
            $settings = $this->get_settings();
            if (!empty($settings['manual_books_count'])) {
                $stats['total_books'] = (int) $settings['manual_books_count'];
            }
            if (!empty($settings['manual_proceedings_count'])) {
                $stats['total_proceedings'] = (int) $settings['manual_proceedings_count'];
            }
        } catch (Exception $e) {
            log_message('error', 'PPIP get_live_stats error: ' . $e->getMessage());
        }

        return $stats;
    }

    // ==========================================
    // CRUD PORTALS
    // ==========================================
    public function get_all_portals()
    {
        if ($this->db && $this->db->conn_id && $this->db->table_exists('ppip_portals')) {
            return $this->db->order_by('order_num', 'ASC')->get('ppip_portals')->result_array();
        }
        return $this->get_portals();
    }

    public function get_portal_by_id($id)
    {
        return $this->db->get_where('ppip_portals', ['id' => $id])->row_array();
    }

    public function insert_portal($data)
    {
        return $this->db->insert('ppip_portals', $data);
    }

    public function update_portal($id, $data)
    {
        $check = $this->db->get_where('ppip_portals', ['id' => $id])->row_array();
        if ($check) {
            return $this->db->where('id', $id)->update('ppip_portals', $data);
        } else {
            $data['id'] = $id;
            return $this->db->insert('ppip_portals', $data);
        }
    }

    public function delete_portal($id)
    {
        return $this->db->where('id', $id)->delete('ppip_portals');
    }

    // ==========================================
    // CRUD AGENDAS
    // ==========================================
    public function get_all_agendas()
    {
        if ($this->db && $this->db->conn_id && $this->db->table_exists('ppip_agenda')) {
            return $this->db->order_by('order_num', 'ASC')->get('ppip_agenda')->result_array();
        }
        return $this->get_agendas(null);
    }

    public function get_agenda_by_id($id)
    {
        return $this->db->get_where('ppip_agenda', ['id' => $id])->row_array();
    }

    public function insert_agenda($data)
    {
        return $this->db->insert('ppip_agenda', $data);
    }

    public function update_agenda($id, $data)
    {
        $check = $this->db->get_where('ppip_agenda', ['id' => $id])->row_array();
        if ($check) {
            return $this->db->where('id', $id)->update('ppip_agenda', $data);
        } else {
            $data['id'] = $id;
            return $this->db->insert('ppip_agenda', $data);
        }
    }

    public function delete_agenda($id)
    {
        return $this->db->where('id', $id)->delete('ppip_agenda');
    }

    // ==========================================
    // UPDATE SETTINGS
    // ==========================================
    public function update_settings($settings)
    {
        if (!$this->db || !$this->db->conn_id) {
            return false;
        }

        // Sinkronkan sinonim key jika salah satu digunakan
        if (isset($settings['hero_desc']) && !isset($settings['hero_description'])) {
            $settings['hero_description'] = $settings['hero_desc'];
        }
        if (isset($settings['hero_description'])) {
            $settings['hero_desc'] = $settings['hero_description'];
        }
        if (isset($settings['about_p1'])) {
            $settings['about_text_1'] = $settings['about_p1'];
        }
        if (isset($settings['about_p2'])) {
            $settings['about_text_2'] = $settings['about_p2'];
        }
        if (isset($settings['about_p3'])) {
            $settings['about_text_3'] = $settings['about_p3'];
        }

        foreach ($settings as $key => $value) {
            $val_clean = is_null($value) ? '' : (string) $value;
            $check = $this->db->get_where('ppip_settings', ['setting_key' => $key])->row_array();
            if ($check) {
                $this->db->where('setting_key', $key)->update('ppip_settings', [
                    'setting_value' => $val_clean
                ]);
            } else {
                $this->db->insert('ppip_settings', [
                    'setting_key' => $key,
                    'setting_value' => $val_clean
                ]);
            }
        }
        return true;
    }

    /**
     * Data 2 Jurnal UIN SAIZU Terindeks Scopus Internasional
     */
    public function get_scopus_journals()
    {
        return [
            [
                'name'         => 'Al-Manahij: Jurnal Kajian Hukum Islam',
                'short_name'   => 'Al-Manahij',
                'scopus_id'    => '21101183612',
                'scopus_url'   => 'https://www.scopus.com/sourceid/21101183612',
                'ojs_url'      => 'http://ejournal.uinsaizu.ac.id/index.php/almanahij',
                'sinta_url'    => 'https://sinta.kemdikbud.go.id/journals/profile/2202',
                'sinta_grade'  => 'SINTA 1',
                'p_issn'       => '1978-6670',
                'e_issn'       => '2579-4167',
                'publisher'    => 'Faculty of Sharia, State Islamic University of Prof. K.H. Saifuddin Zuhri Purwokerto',
                'scope'        => 'Kajian hukum Islam kontemporer, perbandingan hukum Islam, fatwa, dan sosiologi hukum Islam.',
                'coverage'     => '2018 - Present',
                'doaj_indexed' => true
            ],
            [
                'name'         => 'Volksgeist: Jurnal Ilmu Hukum dan Konstitusi',
                'short_name'   => 'Volksgeist',
                'scopus_id'    => '21101176851',
                'scopus_url'   => 'https://www.scopus.com/sourceid/21101176851',
                'ojs_url'      => 'https://ejournal.uinsaizu.ac.id/index.php/volksgeist',
                'sinta_url'    => 'https://sinta.kemdikbud.go.id/journals/profile/5973',
                'sinta_grade'  => 'SINTA 2',
                'p_issn'       => '2615-174X',
                'e_issn'       => '2615-5648',
                'publisher'    => 'Faculty of Sharia, UIN Prof. K.H. Saifuddin Zuhri Purwokerto',
                'scope'        => 'Ilmu hukum, hukum tata negara, hukum konstitusi, hukum administrasi, dan hak asasi manusia.',
                'coverage'     => '2020 - Present',
                'doaj_indexed' => true
            ]
        ];
    }

    /**
     * Data 19 Jurnal UIN SAIZU Terindeks DOAJ (Directory of Open Access Journals)
     */
    public function get_doaj_journals()
    {
        return [
            [
                'name'      => 'Al-Manahij: Jurnal Kajian Hukum Islam',
                'publisher' => 'Faculty of Sharia, UIN Prof. K.H. Saifuddin Zuhri',
                'p_issn'    => '1978-6670',
                'e_issn'    => '2579-4167',
                'url'       => 'http://ejournal.uinsaizu.ac.id/index.php/almanahij',
                'doaj_url'  => 'https://doaj.org/toc/2579-4167',
                'sinta'     => 'S1'
            ],
            [
                'name'      => "Maghza: Jurnal Ilmu Al Qur'an dan Tafsir",
                'publisher' => 'Fakultas Ushuluddin, Adab dan Humaniora',
                'p_issn'    => '2528-6773',
                'e_issn'    => '2549-9971',
                'url'       => 'http://ejournal.uinsaizu.ac.id/index.php/maghza/index',
                'doaj_url'  => 'https://doaj.org/toc/2549-9971',
                'sinta'     => 'S2'
            ],
            [
                'name'      => 'International Journal of Research in Mathematics Education (IJRME)',
                'publisher' => 'Fakultas Tarbiyah dan Ilmu Keguruan (FTIK)',
                'p_issn'    => '3025-1842',
                'e_issn'    => '3025-7638',
                'url'       => 'https://ejournal.uinsaizu.ac.id/index.php/ijrme',
                'doaj_url'  => 'https://doaj.org/toc/3025-7638',
                'sinta'     => '-'
            ],
            [
                'name'      => 'Indonesian Community Development Journal (ICODEV)',
                'publisher' => 'Fakultas Dakwah',
                'p_issn'    => '-',
                'e_issn'    => '2775-1538',
                'url'       => 'https://ejournal.uinsaizu.ac.id/index.php/icodev',
                'doaj_url'  => 'https://doaj.org/toc/2775-1538',
                'sinta'     => 'S3'
            ],
            [
                'name'      => "Al-Ma'mun: Jurnal Kajian Perpustakaan dan Informasi",
                'publisher' => 'UPT Perpustakaan UIN Prof. K.H. Saifuddin Zuhri',
                'p_issn'    => '2723-3596',
                'e_issn'    => '2746-0509',
                'url'       => 'http://ejournal.uinsaizu.ac.id/index.php/jkki',
                'doaj_url'  => 'https://doaj.org/toc/2746-0509',
                'sinta'     => 'S4'
            ],
            [
                'name'      => 'el-Aqwal: Journal of Sharia and Comparative Law',
                'publisher' => 'Fakultas Syariah UIN SAIZU',
                'p_issn'    => '-',
                'e_issn'    => '2962-5289',
                'url'       => 'https://ejournal.uinsaizu.ac.id/index.php/elaqwal/index',
                'doaj_url'  => 'https://doaj.org/toc/2962-5289',
                'sinta'     => 'S3'
            ],
            [
                'name'      => 'Jurnal Kependidikan',
                'publisher' => 'Ikatan Keluarga Alumni (IKA) UIN Saizu',
                'p_issn'    => '2355-018X',
                'e_issn'    => '2598-4845',
                'url'       => 'https://ejournal.uinsaizu.ac.id/index.php/jurnalkependidikan',
                'doaj_url'  => 'https://doaj.org/toc/2598-4845',
                'sinta'     => 'S2'
            ],
            [
                'name'      => 'Transactions on Informatics and Data Science (TIDS)',
                'publisher' => 'Universitas Islam Negeri Profesor Kiai Haji Saifuddin Zuhri',
                'p_issn'    => '-',
                'e_issn'    => '3064-1772',
                'url'       => 'https://ejournal.uinsaizu.ac.id/index.php/tids/',
                'doaj_url'  => 'https://doaj.org/toc/3064-1772',
                'sinta'     => '-'
            ],
            [
                'name'      => 'Yinyang: Jurnal Studi Islam, Gender dan Anak',
                'publisher' => 'Pusat Studi Gender dan Anak (PSGA) LPPM',
                'p_issn'    => '1907-2791',
                'e_issn'    => '2548-5385',
                'url'       => 'http://ejournal.uinsaizu.ac.id/index.php/yinyang',
                'doaj_url'  => 'https://doaj.org/toc/2548-5385',
                'sinta'     => 'S2'
            ],
            [
                'name'      => 'INSANIA: Jurnal Pemikiran Alternatif Kependidikan',
                'publisher' => 'Fakultas Tarbiyah dan Ilmu Keguruan (FTIK)',
                'p_issn'    => '1410-0053',
                'e_issn'    => '2598-3091',
                'url'       => 'http://ejournal.uinsaizu.ac.id/index.php/insania',
                'doaj_url'  => 'https://doaj.org/toc/2598-3091',
                'sinta'     => 'S3'
            ],
            [
                'name'      => 'Jurnal Nusantara Raya',
                'publisher' => 'Lembaga Kajian Nusantara Raya UIN Saizu',
                'p_issn'    => '-',
                'e_issn'    => '2963-4970',
                'url'       => 'https://ejournal.uinsaizu.ac.id/index.php/numera/index',
                'doaj_url'  => 'https://doaj.org/toc/2963-4970',
                'sinta'     => 'S4'
            ],
            [
                'name'      => 'Journal of Islamic History and Manuscript (JIHM)',
                'publisher' => 'LPPM UIN Prof. K.H. Saifuddin Zuhri',
                'p_issn'    => '2964-416X',
                'e_issn'    => '2963-3354',
                'url'       => 'https://ejournal.uinsaizu.ac.id/index.php/jihm',
                'doaj_url'  => 'https://doaj.org/toc/2963-3354',
                'sinta'     => 'S3'
            ],
            [
                'name'      => "IBDA': Jurnal Kebudayaan Islam",
                'publisher' => 'LPPM UIN Prof. K.H. Saifuddin Zuhri',
                'p_issn'    => '1693-6736',
                'e_issn'    => '2477-5517',
                'url'       => 'http://ejournal.uinsaizu.ac.id/index.php/ibda',
                'doaj_url'  => 'https://doaj.org/toc/2477-5517',
                'sinta'     => 'S2'
            ],
            [
                'name'      => 'Volksgeist: Jurnal Ilmu Hukum dan Konstitusi',
                'publisher' => 'Faculty of Sharia UIN Prof. K.H. Saifuddin Zuhri',
                'p_issn'    => '2615-174X',
                'e_issn'    => '2615-5648',
                'url'       => 'https://ejournal.uinsaizu.ac.id/index.php/volksgeist',
                'doaj_url'  => 'https://doaj.org/toc/2615-5648',
                'sinta'     => 'S2'
            ],
            [
                'name'      => 'Mabsya: Jurnal Manajemen Bisnis Syariah',
                'publisher' => 'Fakultas Ekonomi dan Bisnis Islam (FEBI)',
                'p_issn'    => '2714-5565',
                'e_issn'    => '2714-7797',
                'url'       => 'http://ejournal.uinsaizu.ac.id/index.php/mabsya/index',
                'doaj_url'  => 'https://doaj.org/toc/2714-7797',
                'sinta'     => 'S4'
            ],
            [
                'name'      => 'Tarling: Jurnal Pendidikan Bahasa Arab',
                'publisher' => 'Pendidikan Bahasa Arab FTIK',
                'p_issn'    => '2599-1302',
                'e_issn'    => '2614-4271',
                'url'       => 'http://ejournal.uinsaizu.ac.id/index.php/tarling/index',
                'doaj_url'  => 'https://doaj.org/toc/2614-4271',
                'sinta'     => 'S3'
            ],
            [
                'name'      => 'El-Jizya: Jurnal Ekonomi Islam',
                'publisher' => 'Fakultas Ekonomi dan Bisnis Islam (FEBI)',
                'p_issn'    => '2354-905X',
                'e_issn'    => '2579-6208',
                'url'       => 'http://ejournal.uinsaizu.ac.id/index.php/eljizya',
                'doaj_url'  => 'https://doaj.org/toc/2579-6208',
                'sinta'     => 'S3'
            ],
            [
                'name'      => 'Komunika: Jurnal Dakwah dan Komunikasi',
                'publisher' => 'Fakultas Dakwah UIN Saizu',
                'p_issn'    => '1978-1261',
                'e_issn'    => '2548-9496',
                'url'       => 'http://ejournal.uinsaizu.ac.id/index.php/komunika/',
                'doaj_url'  => 'https://doaj.org/toc/2548-9496',
                'sinta'     => 'S3'
            ],
            [
                'name'      => "Ijtimā'iyya: Journal of Muslim Society Research",
                'publisher' => 'Pascasarjana (Postgraduate) UIN Saizu',
                'p_issn'    => '2541-2736',
                'e_issn'    => '2541-0040',
                'url'       => 'http://ejournal.uinsaizu.ac.id/index.php/ijtimaiyya',
                'doaj_url'  => 'https://doaj.org/toc/2541-0040',
                'sinta'     => 'S3'
            ]
        ];
    }
}

