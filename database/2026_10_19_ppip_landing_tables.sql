-- ============================================================
-- Tabel Basis Data Landing Page PPIP LPPM UIN Saizu Purwokerto
-- Kompatibel dengan MySQL 5.5+, 5.7+, 8.0+ dan MariaDB 10+
-- Dijalankan pada database: uinsaizu_publikasi
-- ============================================================

SET FOREIGN_KEY_CHECKS = 0;

-- ------------------------------------------------------------
-- 1. TABEL PENGATURAN KONTEN LANDING PAGE (ppip_settings)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ppip_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data Default Pengaturan PPIP
REPLACE INTO `ppip_settings` (`setting_key`, `setting_value`) VALUES
('hero_badge', 'LPPM UIN Saizu Purwokerto'),
('hero_title', 'Pusat Publikasi Ilmiah dan Penerbitan'),
('hero_subtitle', 'LPPM UIN Prof. K.H. Saifuddin Zuhri Purwokerto'),
('hero_tagline', 'Menguatkan Publikasi, Menghubungkan Gagasan, Memperluas Manfaat Pengetahuan'),
('hero_description', 'Pusat Publikasi Ilmiah dan Penerbitan (PPIP) mendukung pengembangan dan penyebarluasan karya akademik melalui penguatan tata kelola jurnal, penerbitan buku, penyelenggaraan konferensi ilmiah, dan penerbitan prosiding. Kami membangun ruang kolaborasi agar pengetahuan dapat dikembangkan, dipertukarkan, dan dimanfaatkan secara lebih luas.'),
('about_badge', 'Tentang Kami'),
('about_title', 'Pusat Publikasi Ilmiah dan Penerbitan (PPIP)'),
('about_p1', 'Pusat Publikasi Ilmiah dan Penerbitan (PPIP) merupakan pusat di lingkungan Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) UIN Prof. K.H. Saifuddin Zuhri Purwokerto yang mendukung pengembangan ekosistem publikasi ilmiah dan penerbitan universitas.'),
('about_p2', 'PPIP menaungi Griya Jurnal sebagai penggerak koordinasi dan penguatan tata kelola jurnal ilmiah di lingkungan UIN Saizu Purwokerto, serta Saizu Publisher sebagai layanan penerbitan buku. PPIP juga menyediakan layanan penyelenggaraan konferensi ilmiah nasional dan internasional serta penerbitan prosiding sebagai sarana pertukaran gagasan dan penyebarluasan hasil penelitian.'),
('about_p3', 'Melalui sinergi layanan tersebut, PPIP mendukung dosen, peneliti, mahasiswa, penulis, dan pengelola publikasi dalam menghasilkan serta menyebarluaskan karya yang bermutu dan berintegritas. Penyajian data kinerja publikasi turut dikembangkan untuk memperkenalkan kepakaran, mendukung evaluasi, dan membuka peluang kolaborasi akademik.'),
('performance_badge', 'Data & Kepakaran'),
('performance_title', 'Kinerja Publikasi Sivitas Akademika'),
('performance_lead', 'Kenali kepakaran dan kontribusi akademik sivitas UIN Saizu Purwokerto melalui direktori akademisi serta informasi publikasi dan sitasi. Jelajahi karya ilmiah untuk menemukan bidang penelitian, memahami perkembangan publikasi, dan membuka peluang kerja sama.'),
('agenda_badge', 'Kabar & Pengumuman'),
('agenda_title', 'Informasi dan Agenda'),
('agenda_lead', 'Temukan berita kegiatan, pengumuman layanan, agenda konferensi, pelatihan publikasi, pendampingan jurnal, serta informasi penerbitan buku dan prosiding.'),
('cta_title', 'Kembangkan Karya dan Kolaborasi Bersama PPIP'),
('cta_description', 'Temukan layanan yang sesuai dengan kebutuhan publikasi, penerbitan, dan kegiatan ilmiah Anda. Hubungi PPIP untuk memperoleh informasi lebih lanjut dan menjajaki peluang kolaborasi.'),
('contact_address', 'Gedung LPPM Lt. 2, Kampus UIN Prof. K.H. Saifuddin Zuhri, Jl. A. Yani No. 40A, Purwokerto, Jawa Tengah 53126'),
('contact_email', 'ppip@uinsaizu.ac.id'),
('contact_phone', '0281-635624'),
('contact_hours', 'Senin - Jumat | 08.00 - 16.00 WIB'),
('manual_books_count', '150'),
('manual_proceedings_count', '12');

-- ------------------------------------------------------------
-- 2. TABEL PORTAL LAYANAN PPIP (ppip_portals)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ppip_portals` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data Default Portal Layanan
REPLACE INTO `ppip_portals` (`id`, `portal_name`, `subtitle`, `badge_tag`, `description`, `url`, `button_text`, `domain_label`, `icon_class`, `color_theme`, `order_num`, `is_active`) VALUES
(1, 'Griya Jurnal', 'Penguatan Tata Kelola Jurnal', 'OJS & Akreditasi SINTA', 'Griya Jurnal menjadi wadah koordinasi, pembinaan, dan pengembangan jurnal ilmiah di lingkungan UIN Saizu Purwokerto. Melalui kolaborasi dengan para pengelola jurnal, Griya Jurnal mendorong peningkatan kualitas artikel, profesionalitas pengelolaan editorial, penerapan etika publikasi, serta pengembangan akreditasi dan indeksasi.', 'https://ejournal.uinsaizu.ac.id', 'Kunjungi Griya Jurnal', 'ejournal.uinsaizu.ac.id', 'fas fa-newspaper', 'green', 1, 1),
(2, 'Saizu Publisher', 'Penerbitan Buku', 'ISBN & Katalog Karya', 'Saizu Publisher memfasilitasi penerbitan buku sebagai sarana pengembangan ilmu pengetahuan, pengayaan sumber pembelajaran, dan penyebarluasan gagasan. Penulis dan pembaca dapat mengakses informasi penerbitan serta menelusuri katalog karya melalui portal Saizu Publisher.', 'https://books.uinsaizu.ac.id', 'Kunjungi Saizu Publisher', 'books.uinsaizu.ac.id', 'fas fa-book-reader', 'gold', 2, 1),
(3, 'Konferensi Ilmiah', 'Pertukaran Gagasan dan Kolaborasi', 'Forum Nasional & Internasional', 'Layanan konferensi ilmiah mendukung penyelenggaraan forum akademik berskala nasional dan internasional. Melalui forum ini, peneliti, akademisi, dan praktisi dapat mempresentasikan hasil penelitian, mendiskusikan perkembangan keilmuan, serta membangun jejaring kolaborasi.', 'https://conferences.uinsaizu.ac.id', 'Jelajahi Konferensi', 'conferences.uinsaizu.ac.id', 'fas fa-chalkboard-teacher', 'blue', 3, 1),
(4, 'Prosiding', 'Dokumentasi dan Penyebarluasan Karya Ilmiah', 'Open Access & Repositori', 'Layanan prosiding mendukung penerbitan dan penyebarluasan makalah dari kegiatan ilmiah. Portal prosiding menjadi sarana untuk menelusuri karya yang dipresentasikan dalam forum akademik, sehingga gagasan dan hasil penelitian dapat diakses serta dipelajari lebih lanjut.', 'https://proceedings.uinsaizu.ac.id', 'Jelajahi Prosiding', 'proceedings.uinsaizu.ac.id', 'fas fa-scroll', 'purple', 4, 1);

-- ------------------------------------------------------------
-- 3. TABEL INFORMASI & AGENDA KEGIATAN PPIP (ppip_agenda)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ppip_agenda` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data Default Informasi & Agenda
REPLACE INTO `ppip_agenda` (`id`, `title`, `category`, `category_class`, `event_date`, `description`, `link_url`, `link_text`, `order_num`, `is_active`) VALUES
(1, 'Workshop Akselerasi Akreditasi Jurnal Ilmiah Menuju SINTA 2', 'Jurnal', 'jurnal', 'Terjadwal 2026', 'Pendampingan intensif bagi para pengelola jurnal di lingkungan UIN Saizu dalam pemenuhan standar tata kelola editorial dan etika publikasi.', '#', 'Baca Selengkapnya', 1, 1),
(2, 'Call for Book Chapters & Monograf Saizu Publisher', 'Penerbitan', 'buku', 'Buka Setiap Saat', 'Peluang penerbitan buku ajar, buku referensi, dan monograf ber-ISBN bagi para dosen dan peneliti dengan proses review profesional.', '#', 'Pedoman Penulisan', 2, 1),
(3, 'International Conference on Islamic Studies and Science', 'Konferensi', 'konferensi', 'Tahunan', 'Forum akademik internasional untuk mendiskusikan integrasi keilmuan Islam, sains, dan teknologi dengan publikasi prosiding terindeks.', '#', 'Jadwal & Call for Papers', 3, 1);

SET FOREIGN_KEY_CHECKS = 1;

