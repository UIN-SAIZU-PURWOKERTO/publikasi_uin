<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title); ?></title>
    <meta name="description" content="Peta Situs (Sitemap) resmi Pusat Publikasi Ilmiah dan Penerbitan (PPIP) LPPM UIN Prof. K.H. Saifuddin Zuhri Purwokerto. Temukan seluruh direktori halaman, portal layanan, dan data publikasi.">
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/logo.png'); ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">

    <!-- Custom Landing Page CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/landing/css/landing.css'); ?>">

    <style>
        .sitemap-header {
            background: linear-gradient(135deg, #064E3B 0%, #047857 60%, #0B1528 100%);
            color: #ffffff;
            padding: 130px 0 60px;
            position: relative;
            overflow: hidden;
        }
        .sitemap-header::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.4;
        }
        .sitemap-breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 16px;
        }
        .sitemap-breadcrumb a {
            color: #A7F3D0;
            text-decoration: none;
            transition: var(--transition);
        }
        .sitemap-breadcrumb a:hover {
            color: #ffffff;
            text-decoration: underline;
        }
        .sitemap-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: -0.02em;
        }
        .sitemap-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.85);
            max-width: 720px;
            line-height: 1.6;
        }

        .sitemap-search-card {
            background: #ffffff;
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-xl);
            margin-top: -30px;
            position: relative;
            z-index: 10;
            border: 1px solid var(--border-light);
        }
        .search-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }
        .search-input-wrapper i {
            position: absolute;
            left: 18px;
            color: var(--text-muted);
            font-size: 1.1rem;
        }
        .search-input-wrapper input {
            width: 100%;
            padding: 14px 20px 14px 48px;
            border: 2px solid var(--border-light);
            border-radius: var(--radius-md);
            font-size: 1rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: var(--transition);
        }
        .search-input-wrapper input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(4, 120, 87, 0.15);
        }

        .sitemap-section {
            padding: 50px 0 30px;
        }
        .sitemap-category-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            padding-bottom: 12px;
            border-bottom: 2px solid #E2E8F0;
        }
        .sitemap-category-title {
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--navy-900);
        }
        .sitemap-category-title .cat-icon {
            width: 42px;
            height: 42px;
            border-radius: var(--radius-md);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }
        .cat-icon.green { background: #DCFCE7; color: #166534; }
        .cat-icon.gold { background: #FEF3C7; color: #92400E; }
        .cat-icon.blue { background: #DBEAFE; color: #1E40AF; }
        .cat-icon.purple { background: #F3E8FF; color: #6B21A8; }
        .cat-icon.red { background: #FEE2E2; color: #991B1B; }

        .sitemap-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(330px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .sitemap-card {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 22px;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }
        .sitemap-card:hover {
            transform: translateY(-4px);
            border-color: var(--primary-light);
            box-shadow: var(--shadow-md);
        }
        .sitemap-card-top {
            margin-bottom: 16px;
        }
        .sitemap-badge-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .badge-type {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 4px 10px;
            border-radius: var(--radius-full);
            background: #F1F5F9;
            color: var(--text-secondary);
        }
        .badge-type.primary { background: #E6F4EA; color: #047857; }
        .badge-type.warning { background: #FEF3C7; color: #B45309; }
        .badge-type.info { background: #E0F2FE; color: #0369A1; }
        .badge-type.danger { background: #FFE4E6; color: #BE123C; }

        .sitemap-card-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--navy-900);
            margin-bottom: 8px;
            line-height: 1.35;
        }
        .sitemap-card-desc {
            font-size: 0.88rem;
            color: var(--text-secondary);
            line-height: 1.5;
            margin-bottom: 12px;
        }
        .sitemap-url-box {
            background: #F8FAFC;
            border: 1px dashed var(--border-light);
            border-radius: var(--radius-sm);
            padding: 8px 12px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 0.82rem;
            color: var(--primary-dark);
            word-break: break-all;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }
        .sitemap-url-box span {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .btn-copy-url {
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            padding: 2px 6px;
            border-radius: 4px;
            transition: var(--transition);
        }
        .btn-copy-url:hover {
            color: var(--primary);
            background: #E2E8F0;
        }
        .sitemap-card-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .btn-visit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 9px 16px;
            font-size: 0.88rem;
            font-weight: 600;
            border-radius: var(--radius-sm);
            background: var(--primary);
            color: #ffffff;
            text-decoration: none;
            transition: var(--transition);
            width: 100%;
        }
        .btn-visit:hover {
            background: var(--primary-dark);
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(4, 120, 87, 0.25);
        }
        .btn-visit.outline {
            background: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        .btn-visit.outline:hover {
            background: var(--primary);
            color: #ffffff;
        }

        .xml-banner {
            background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
            border-radius: var(--radius-lg);
            padding: 30px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
            margin-bottom: 60px;
        }
        .xml-banner-text h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 6px;
        }
        .xml-banner-text p {
            color: #94A3B8;
            font-size: 0.95rem;
            max-width: 600px;
        }
    </style>
</head>
<body>

    <!-- ==========================================================================
       NAVBAR
       ========================================================================== -->
    <header class="site-navbar" id="siteNavbar">
        <div class="container navbar-inner">
            <a href="<?= base_url('ppip'); ?>" class="brand-wrapper">
                <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo UIN Saizu" class="brand-logo">
                <div class="brand-text">
                    <h1>PPIP UIN SAIZU</h1>
                    <span><?= htmlspecialchars($settings['hero_subtitle']); ?></span>
                </div>
            </a>

            <nav>
                <ul class="nav-links" id="navLinks">
                    <li><a href="<?= base_url('ppip#beranda'); ?>">Beranda</a></li>
                    <li><a href="<?= base_url('ppip#tentang'); ?>">Tentang</a></li>
                    <li><a href="<?= base_url('ppip#layanan'); ?>">Layanan & Portal</a></li>
                    <li><a href="<?= base_url('ppip#kinerja'); ?>">Kinerja Publikasi</a></li>
                    <li><a href="<?= base_url('ppip#informasi'); ?>">Informasi</a></li>
                    <li><a href="<?= base_url('ppip#kontak'); ?>">Kontak</a></li>
                    <li><a href="<?= base_url('sitemap'); ?>" class="active"><i class="fas fa-sitemap mr-1"></i> Peta Situs</a></li>
                </ul>
            </nav>

            <div class="nav-cta">
                <a href="<?= base_url('dashboard/authors'); ?>" class="btn btn-outline btn-sm">
                    <i class="fas fa-chart-line"></i> Kinerja Publikasi
                </a>
            </div>

            <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <!-- ==========================================================================
       HEADER HERO SITEMAP
       ========================================================================== -->
    <section class="sitemap-header">
        <div class="container">
            <div class="sitemap-breadcrumb">
                <a href="<?= base_url('ppip'); ?>"><i class="fas fa-home"></i> Beranda</a>
                <span><i class="fas fa-chevron-right fa-xs"></i></span>
                <span>Peta Situs & Direktori URL</span>
            </div>
            <h1 class="sitemap-title">Peta Situs Halaman & Portal Layanan</h1>
            <p class="sitemap-subtitle">
                Daftar lengkap seluruh tautan halaman, bagian landing page, portal akademik eksternal, dan sistem analitik di lingkungan Pusat Publikasi Ilmiah dan Penerbitan (PPIP) LPPM UIN Saizu Purwokerto.
            </p>
        </div>
    </section>

    <!-- ==========================================================================
       SEARCH BOX & SITEMAP CONTENT
       ========================================================================== -->
    <main class="container">
        <div class="sitemap-search-card">
            <div class="search-input-wrapper">
                <i class="fas fa-search"></i>
                <input type="text" id="sitemapFilter" placeholder="Cari nama halaman, portal, topik, atau kata kunci URL..." autocomplete="off">
            </div>
        </div>

        <section class="sitemap-section">
            <!-- 1. KATEGORI: LANDING PAGE PPIP -->
            <div class="sitemap-category-header">
                <div class="sitemap-category-title">
                    <span class="cat-icon green"><i class="fas fa-home"></i></span>
                    <span>1. Bagian Halaman Utama PPIP (Landing Page)</span>
                </div>
                <span class="badge-type primary">6 Bagian URL</span>
            </div>

            <div class="sitemap-grid" id="gridLanding">
                <!-- Beranda -->
                <div class="sitemap-card sitemap-item" data-keywords="beranda home banner ppip utama lppm">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type primary">Section Utama</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-anchor mr-1"></i> #beranda</span>
                        </div>
                        <h3 class="sitemap-card-title">Banner Utama & Sambutan PPIP</h3>
                        <p class="sitemap-card-desc">Bagian teratas landing page yang memuat pengantar, visi, tagline PPIP, serta ringkasan angka metrik live sivitas.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('ppip#beranda'); ?>"><?= base_url('ppip#beranda'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('ppip#beranda'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('ppip#beranda'); ?>" class="btn-visit"><i class="fas fa-external-link-alt"></i> Kunjungi Bagian</a>
                    </div>
                </div>

                <!-- Tentang -->
                <div class="sitemap-card sitemap-item" data-keywords="tentang profil visi misi griya jurnal saizu publisher ppip">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type primary">Section Profil</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-anchor mr-1"></i> #tentang</span>
                        </div>
                        <h3 class="sitemap-card-title">Profil & Tentang PPIP LPPM</h3>
                        <p class="sitemap-card-desc">Paparan komprehensif mengenai kedudukan PPIP di bawah LPPM UIN Saizu, sinergi pengelola jurnal, dan penerbitan karya ilmiah.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('ppip#tentang'); ?>"><?= base_url('ppip#tentang'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('ppip#tentang'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('ppip#tentang'); ?>" class="btn-visit"><i class="fas fa-external-link-alt"></i> Kunjungi Bagian</a>
                    </div>
                </div>

                <!-- Layanan & Portal -->
                <div class="sitemap-card sitemap-item" data-keywords="layanan portal ojs jurnal publisher konferensi prosiding">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type primary">Section Layanan</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-anchor mr-1"></i> #layanan</span>
                        </div>
                        <h3 class="sitemap-card-title">Portal & Layanan Utama PPIP</h3>
                        <p class="sitemap-card-desc">Etalase kartu layanan Griya Jurnal, Saizu Publisher, Konferensi Ilmiah, dan Prosiding ber-ISSN/ISBN.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('ppip#layanan'); ?>"><?= base_url('ppip#layanan'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('ppip#layanan'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('ppip#layanan'); ?>" class="btn-visit"><i class="fas fa-external-link-alt"></i> Kunjungi Bagian</a>
                    </div>
                </div>

                <!-- Kinerja Publikasi -->
                <div class="sitemap-card sitemap-item" data-keywords="kinerja publikasi data sitasi scopus scholar sinta author">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type primary">Section Data</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-anchor mr-1"></i> #kinerja</span>
                        </div>
                        <h3 class="sitemap-card-title">Statistik Kinerja Publikasi</h3>
                        <p class="sitemap-card-desc">Preview metrik publikasi sivitas akademika, total jurnal terakreditasi, artikel Scopus, dan sitasi Google Scholar.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('ppip#kinerja'); ?>"><?= base_url('ppip#kinerja'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('ppip#kinerja'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('ppip#kinerja'); ?>" class="btn-visit"><i class="fas fa-external-link-alt"></i> Kunjungi Bagian</a>
                    </div>
                </div>

                <!-- Informasi & Agenda -->
                <div class="sitemap-card sitemap-item" data-keywords="informasi agenda kabar pengumuman workshop call for papers event">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type primary">Section Berita</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-anchor mr-1"></i> #informasi</span>
                        </div>
                        <h3 class="sitemap-card-title">Informasi & Agenda Kegiatan</h3>
                        <p class="sitemap-card-desc">Kabar terbaru, pengumuman workshop editorial, call for book chapters, dan konferensi internasional.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('ppip#informasi'); ?>"><?= base_url('ppip#informasi'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('ppip#informasi'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('ppip#informasi'); ?>" class="btn-visit"><i class="fas fa-external-link-alt"></i> Kunjungi Bagian</a>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="sitemap-card sitemap-item" data-keywords="kontak alamat email telepon jam kerja lppm sekretariat">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type primary">Section Footer</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-anchor mr-1"></i> #kontak</span>
                        </div>
                        <h3 class="sitemap-card-title">Sekretariat & Hubungi PPIP</h3>
                        <p class="sitemap-card-desc">Informasi kontak langsung, alamat kantor Gedung LPPM Lt. 2, email, telepon, dan jam operasional layanan.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('ppip#kontak'); ?>"><?= base_url('ppip#kontak'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('ppip#kontak'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('ppip#kontak'); ?>" class="btn-visit"><i class="fas fa-external-link-alt"></i> Kunjungi Bagian</a>
                    </div>
                </div>
            </div>

            <!-- 2. KATEGORI: PORTAL LAYANAN AKADEMIK -->
            <div class="sitemap-category-header">
                <div class="sitemap-category-title">
                    <span class="cat-icon gold"><i class="fas fa-cubes"></i></span>
                    <span>2. Portal Layanan Ekosistem PPIP</span>
                </div>
                <span class="badge-type warning"><?= count($portals); ?> Portal Aktif</span>
            </div>

            <div class="sitemap-grid" id="gridPortals">
                <?php foreach ($portals as $p): ?>
                <div class="sitemap-card sitemap-item" data-keywords="<?= htmlspecialchars(strtolower($p['portal_name'] . ' ' . $p['subtitle'] . ' ' . $p['badge_tag'] . ' ' . $p['url'])); ?>">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type warning"><?= htmlspecialchars($p['badge_tag'] ?? 'Layanan PPIP'); ?></span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="<?= htmlspecialchars($p['icon_class'] ?? 'fas fa-globe'); ?> mr-1"></i> Portal</span>
                        </div>
                        <h3 class="sitemap-card-title"><?= htmlspecialchars($p['portal_name']); ?></h3>
                        <p class="sitemap-card-desc"><?= htmlspecialchars($p['description']); ?></p>
                        <div class="sitemap-url-box">
                            <span title="<?= htmlspecialchars($p['url']); ?>"><?= htmlspecialchars($p['url']); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= htmlspecialchars($p['url']); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= htmlspecialchars($p['url']); ?>" target="_blank" rel="noopener noreferrer" class="btn-visit outline">
                            <i class="fas fa-external-link-alt"></i> <?= htmlspecialchars($p['button_text'] ?: 'Buka Portal'); ?>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- 3. KATEGORI: KINERJA & ANALITIK PUBLIKASI -->
            <div class="sitemap-category-header">
                <div class="sitemap-category-title">
                    <span class="cat-icon blue"><i class="fas fa-chart-line"></i></span>
                    <span>3. Dashboard Kinerja & Analitik Publikasi</span>
                </div>
                <span class="badge-type info">4 Dashboard Data</span>
            </div>

            <div class="sitemap-grid" id="gridKinerja">
                <!-- Authors -->
                <div class="sitemap-card sitemap-item" data-keywords="authors direktori dosen author sivitas sinta id kepakaran">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type info">Direktori Author</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-user-graduate mr-1"></i> Dashboard</span>
                        </div>
                        <h3 class="sitemap-card-title">Direktori Author & Dosen UIN Saizu</h3>
                        <p class="sitemap-card-desc">Daftar author sivitas akademika dengan metrik SINTA Score 3Yr, Scopus H-Index, Scholar Citation, dan profil kepakaran.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('dashboard/authors'); ?>"><?= base_url('dashboard/authors'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('dashboard/authors'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('dashboard/authors'); ?>" class="btn-visit"><i class="fas fa-chart-line"></i> Lihat Direktori</a>
                    </div>
                </div>

                <!-- Scopus SDGs -->
                <div class="sitemap-card sitemap-item" data-keywords="scopus sdgs fakultas sitasi artikel internasional terindeks sains teknologi">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type info">Scopus Index</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-globe-asia mr-1"></i> SDGs</span>
                        </div>
                        <h3 class="sitemap-card-title">Publikasi Scopus Berdasarkan SDGs</h3>
                        <p class="sitemap-card-desc">Grafik dan sebaran karya ilmiah terindeks Scopus per fakultas yang mendukung Sustainable Development Goals.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('dashboard/scopus_sdgs'); ?>"><?= base_url('dashboard/scopus_sdgs'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('dashboard/scopus_sdgs'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('dashboard/scopus_sdgs'); ?>" class="btn-visit"><i class="fas fa-chart-bar"></i> Buka Analitik Scopus</a>
                    </div>
                </div>

                <!-- Scholar SDGs -->
                <div class="sitemap-card sitemap-item" data-keywords="scholar google sdgs sitasi fakultas publikasi sitasi artikel">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type info">Google Scholar</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-graduation-cap mr-1"></i> Sitasi</span>
                        </div>
                        <h3 class="sitemap-card-title">Publikasi Google Scholar SDGs</h3>
                        <p class="sitemap-card-desc">Distribusi artikel dan dokumen ilmiah sivitas yang terindeks Google Scholar serta relevansinya terhadap klaster SDGs.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('dashboard/scholar_sdgs'); ?>"><?= base_url('dashboard/scholar_sdgs'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('dashboard/scholar_sdgs'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('dashboard/scholar_sdgs'); ?>" class="btn-visit"><i class="fas fa-chart-pie"></i> Buka Analitik Scholar</a>
                    </div>
                </div>

                <!-- Jurnal Sinta -->
                <div class="sitemap-card sitemap-item" data-keywords="jurnal sinta akreditasi ojs s1 s2 s3 s4 s5 s6 lppm">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type info">Akreditasi Jurnal</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-award mr-1"></i> SINTA</span>
                        </div>
                        <h3 class="sitemap-card-title">Akreditasi Jurnal Ilmiah (SINTA)</h3>
                        <p class="sitemap-card-desc">Sebaran akreditasi jurnal ilmiah yang diterbitkan di lingkungan UIN Saizu Purwokerto dari SINTA 1 hingga 6.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('dashboard/jurnal_sinta'); ?>"><?= base_url('dashboard/jurnal_sinta'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('dashboard/jurnal_sinta'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('dashboard/jurnal_sinta'); ?>" class="btn-visit"><i class="fas fa-list-ol"></i> Lihat Jurnal SINTA</a>
                    </div>
                </div>
            </div>

            <!-- 4. KATEGORI: MANAJEMEN ADMIN -->
            <div class="sitemap-category-header">
                <div class="sitemap-category-title">
                    <span class="cat-icon purple"><i class="fas fa-tools"></i></span>
                    <span>4. Portal Pengelola & Administrator</span>
                </div>
                <span class="badge-type danger">Area Terbatas</span>
            </div>

            <div class="sitemap-grid" id="gridAdmin">
                <div class="sitemap-card sitemap-item" data-keywords="auth login masuk admin pengelola password">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type danger">Autentikasi</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-lock mr-1"></i> Login</span>
                        </div>
                        <h3 class="sitemap-card-title">Login Sistem Pengelola</h3>
                        <p class="sitemap-card-desc">Gerbang masuk admin LPPM & pengelola jurnal untuk mengelola konten dan data master publikasi.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('auth'); ?>"><?= base_url('auth'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('auth'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('auth'); ?>" class="btn-visit outline"><i class="fas fa-sign-in-alt"></i> Halaman Login</a>
                    </div>
                </div>

                <div class="sitemap-card sitemap-item" data-keywords="kelola portals tambah edit hapus layanan griya publisher">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type danger">Admin PPIP</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-cubes mr-1"></i> CRUD</span>
                        </div>
                        <h3 class="sitemap-card-title">Kelola Portal Layanan PPIP</h3>
                        <p class="sitemap-card-desc">Menu admin untuk menambah, mengubah, mengurutkan, atau menonaktifkan portal layanan pada halaman depan.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('kelola_ppip/portals'); ?>"><?= base_url('kelola_ppip/portals'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('kelola_ppip/portals'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('kelola_ppip/portals'); ?>" class="btn-visit"><i class="fas fa-cog"></i> Buka Kelola Portal</a>
                    </div>
                </div>

                <div class="sitemap-card sitemap-item" data-keywords="kelola agenda kabar pengumuman event workshop">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type danger">Admin PPIP</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-calendar-alt mr-1"></i> CRUD</span>
                        </div>
                        <h3 class="sitemap-card-title">Kelola Agenda & Kabar PPIP</h3>
                        <p class="sitemap-card-desc">Menu admin untuk mempublikasikan pengumuman, call for papers, dan agenda workshop publikasi ilmiah.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('kelola_ppip/agenda'); ?>"><?= base_url('kelola_ppip/agenda'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('kelola_ppip/agenda'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('kelola_ppip/agenda'); ?>" class="btn-visit"><i class="fas fa-bullhorn"></i> Buka Kelola Agenda</a>
                    </div>
                </div>

                <div class="sitemap-card sitemap-item" data-keywords="pengaturan settings konten teks hero banner tagline kontak">
                    <div class="sitemap-card-top">
                        <div class="sitemap-badge-row">
                            <span class="badge-type danger">Admin PPIP</span>
                            <span class="text-muted" style="font-size: 0.8rem;"><i class="fas fa-sliders-h mr-1"></i> Konfigurasi</span>
                        </div>
                        <h3 class="sitemap-card-title">Pengaturan Konten & Teks Portal</h3>
                        <p class="sitemap-card-desc">Panel konfigurasi judul utama, tagline, narasi tentang PPIP, angka statistik buku/prosiding, dan kontak.</p>
                        <div class="sitemap-url-box">
                            <span title="<?= base_url('kelola_ppip/settings'); ?>"><?= base_url('kelola_ppip/settings'); ?></span>
                            <button type="button" class="btn-copy-url" data-url="<?= base_url('kelola_ppip/settings'); ?>" title="Salin URL"><i class="far fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="sitemap-card-actions">
                        <a href="<?= base_url('kelola_ppip/settings'); ?>" class="btn-visit"><i class="fas fa-wrench"></i> Buka Pengaturan</a>
                    </div>
                </div>
            </div>

            <!-- 5. KATEGORI: SEO & MESIN PENCARI -->
            <div class="xml-banner">
                <div class="xml-banner-text">
                    <span class="badge-type info" style="background: rgba(255,255,255,0.15); color: #7DD3FC; margin-bottom: 8px; display: inline-block;">
                        <i class="fas fa-robot mr-1"></i> Standar Mesin Pencari (Google, Bing, Yahoo)
                    </span>
                    <h3>Peta Situs XML (XML Sitemap) untuk Indexing SEO</h3>
                    <p>
                        Format standar XML sitemap yang diproses oleh web crawler Googlebot untuk mempercepat pengindeksan seluruh direktori publikasi dan portal resmi UIN Saizu Purwokerto.
                    </p>
                </div>
                <div>
                    <a href="<?= base_url('sitemap.xml'); ?>" target="_blank" class="btn btn-primary" style="background: #10B981; border: none; padding: 12px 24px; font-weight: 700;">
                        <i class="fas fa-code mr-1"></i> Buka sitemap.xml
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- ==========================================================================
       FOOTER
       ========================================================================== -->
    <footer class="site-footer" id="kontak">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo UIN Saizu" class="brand-logo">
                    <h3><?= htmlspecialchars($settings['hero_title']); ?></h3>
                    <span><?= htmlspecialchars($settings['hero_subtitle']); ?></span>
                    <p>
                        Membangun ruang kolaborasi agar pengetahuan dapat dikembangkan, dipertukarkan, dan dimanfaatkan secara lebih luas bagi peradaban.
                    </p>
                </div>

                <div class="footer-col">
                    <h4>Portal Layanan</h4>
                    <ul class="footer-links">
                        <?php if (!empty($portals)): ?>
                            <?php foreach ($portals as $p): ?>
                                <li>
                                    <a href="<?= htmlspecialchars($p['url']); ?>" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-chevron-right"></i> <?= htmlspecialchars($p['portal_name']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Kinerja & Analitik</h4>
                    <ul class="footer-links">
                        <li><a href="<?= base_url('dashboard/authors'); ?>"><i class="fas fa-chevron-right"></i> Direktori Author & Dosen</a></li>
                        <li><a href="<?= base_url('dashboard/scopus_sdgs'); ?>"><i class="fas fa-chevron-right"></i> Sitasi Scopus Fakultas</a></li>
                        <li><a href="<?= base_url('dashboard/scholar_sdgs'); ?>"><i class="fas fa-chevron-right"></i> Sitasi Google Scholar</a></li>
                        <li><a href="<?= base_url('dashboard/jurnal_sinta'); ?>"><i class="fas fa-chevron-right"></i> Akreditasi SINTA</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Sekretariat LPPM</h4>
                    <div class="footer-contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?= htmlspecialchars($settings['contact_address']); ?></span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-envelope"></i>
                        <span><?= htmlspecialchars($settings['contact_email']); ?></span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-phone"></i>
                        <span><?= htmlspecialchars($settings['contact_phone']); ?></span>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?= date('Y'); ?> <?= htmlspecialchars($settings['hero_title']); ?>. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="<?= base_url('ppip#beranda'); ?>">Beranda</a>
                    <a href="<?= base_url('ppip#tentang'); ?>">Tentang</a>
                    <a href="<?= base_url('ppip#layanan'); ?>">Layanan</a>
                    <a href="<?= base_url('sitemap'); ?>" style="color: #10B981; font-weight: 700;"><i class="fas fa-sitemap mr-1"></i> Peta Situs</a>
                    <a href="<?= base_url('sitemap.xml'); ?>" target="_blank"><i class="fas fa-rss mr-1"></i> XML</a>
                    <a href="<?= base_url('auth'); ?>">Login Pengelola</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Filter & Copy URL Script -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // 1. Live Filter Sitemap
        const filterInput = document.getElementById('sitemapFilter');
        const items = document.querySelectorAll('.sitemap-item');

        if (filterInput) {
            filterInput.addEventListener('input', function () {
                const query = this.value.toLowerCase().trim();
                items.forEach(function (item) {
                    const text = (item.innerText + ' ' + (item.getAttribute('data-keywords') || '')).toLowerCase();
                    if (text.includes(query)) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        }

        // 2. Salin URL Tombol
        document.querySelectorAll('.btn-copy-url').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const url = this.getAttribute('data-url');
                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(url).then(showCopied);
                } else {
                    const temp = document.createElement('input');
                    temp.value = url;
                    document.body.appendChild(temp);
                    temp.select();
                    document.execCommand('copy');
                    document.body.removeChild(temp);
                    showCopied();
                }

                function showCopied() {
                    const original = btn.innerHTML;
                    btn.innerHTML = '<i class="fas fa-check text-success"></i>';
                    setTimeout(() => { btn.innerHTML = original; }, 2000);
                }
            });
        });
    });
    </script>
</body>
</html>
