<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($settings['hero_title']); ?> | <?= htmlspecialchars($settings['hero_badge']); ?></title>
    <meta name="description" content="<?= htmlspecialchars($settings['hero_description']); ?>">
    <meta name="keywords" content="PPIP, LPPM, UIN Saizu, Griya Jurnal, Saizu Publisher, Konferensi Ilmiah, Prosiding, Publikasi Ilmiah, Sinta, Scopus">
    <meta name="author" content="LPPM UIN Saizu Purwokerto">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/logo.png'); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">

    <!-- Custom Landing Page CSS (Isolated in assets/landing/) -->
    <link rel="stylesheet" href="<?= base_url('assets/landing/css/landing.css'); ?>">
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
                    <li><a href="<?= base_url('ppip/beranda'); ?>" data-section="beranda" class="nav-section-link <?= ($active_section === 'beranda') ? 'active' : ''; ?>">Beranda</a></li>
                    <li><a href="<?= base_url('ppip/tentang'); ?>" data-section="tentang" class="nav-section-link <?= ($active_section === 'tentang') ? 'active' : ''; ?>">Tentang</a></li>
                    <li><a href="<?= base_url('ppip/layanan'); ?>" data-section="layanan" class="nav-section-link <?= ($active_section === 'layanan') ? 'active' : ''; ?>">Layanan & Portal</a></li>
                    <li><a href="<?= base_url('ppip/kinerja'); ?>" data-section="kinerja" class="nav-section-link <?= ($active_section === 'kinerja') ? 'active' : ''; ?>">Kinerja Publikasi</a></li>
                    <li><a href="<?= base_url('ppip/informasi'); ?>" data-section="informasi" class="nav-section-link <?= ($active_section === 'informasi') ? 'active' : ''; ?>">Informasi</a></li>
                    <li><a href="<?= base_url('ppip/disclaimer'); ?>" data-section="disclaimer" class="nav-section-link <?= ($active_section === 'disclaimer') ? 'active' : ''; ?>">Disclaimer</a></li>
                    <li><a href="<?= base_url('ppip/kontak'); ?>" data-section="kontak" class="nav-section-link <?= ($active_section === 'kontak') ? 'active' : ''; ?>">Kontak</a></li>
                    <!-- <li><a href="<?= base_url('sitemap'); ?>"><i class="fas fa-sitemap mr-1"></i> Peta Situs</a></li> -->
                </ul>
            </nav>

            <div class="nav-cta">
                <a href="<?= base_url('dashboard/authors'); ?>" class="btn btn-outline btn-sm">
                    <i class="fas fa-chart-line"></i> Kinerja Publikasi
                </a>
                <!-- <a href="<?= base_url('auth'); ?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </a> -->
            </div>

            <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <!-- ==========================================================================
       HERO SECTION
       ========================================================================== -->
    <section class="hero-section" id="beranda">
        <div class="hero-mesh"></div>
        <div class="container hero-content">
            <span class="pill-badge primary">
                <i class="fas fa-university"></i> <?= htmlspecialchars($settings['hero_badge']); ?>
            </span>
            
            <h1 class="hero-title">
                <?= htmlspecialchars($settings['hero_title']); ?>
            </h1>
            
            <div class="hero-subtitle">
                <?= htmlspecialchars($settings['hero_subtitle']); ?>
            </div>

            <p class="hero-tagline">
                "<?= htmlspecialchars($settings['hero_tagline']); ?>"
            </p>

            <p class="hero-desc">
                <?= nl2br(htmlspecialchars($settings['hero_description'])); ?>
            </p>

            <div class="hero-actions">
                <a href="#layanan" class="btn btn-primary btn-lg">
                    <i class="fas fa-compass"></i> Jelajahi Layanan
                </a>
                <a href="<?= base_url('dashboard/authors'); ?>" class="btn btn-outline btn-lg">
                    <i class="fas fa-chart-bar"></i> Lihat Kinerja Publikasi
                </a>
            </div>

            <!-- Stats Banner (Live dari Database) -->
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-icon green">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="stat-info">
                        <h3 data-counter="<?= (int)($stats['total_journals'] ?? 28); ?>" data-suffix="+"><?= (int)($stats['total_journals'] ?? 28); ?>+</h3>
                        <p>Jurnal Ilmiah</p>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-icon amber">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="stat-info">
                        <h3 data-counter="<?= (int)($stats['total_books'] ?? 150); ?>" data-suffix="+"><?= (int)($stats['total_books'] ?? 150); ?>+</h3>
                        <p>Buku Ber-ISBN</p>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-icon blue">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-info">
                        <h3 data-counter="<?= (int)($stats['total_authors'] ?? 350); ?>" data-suffix="+"><?= (int)($stats['total_authors'] ?? 350); ?>+</h3>
                        <p>Author Terdaftar</p>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-icon purple">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="stat-info">
                        <h3 data-counter="<?= (int)($stats['total_proceedings'] ?? 12); ?>" data-suffix="+"><?= (int)($stats['total_proceedings'] ?? 12); ?>+</h3>
                        <p>Prosiding Ilmiah</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ==========================================================================
       TENTANG PPIP (Basis Data)
       ========================================================================== -->
    <section class="about-section" id="tentang">
        <div class="container about-grid">
            <div class="about-text">
                <span class="pill-badge gold">
                    <i class="fas fa-info-circle"></i> <?= htmlspecialchars($settings['about_badge']); ?>
                </span>
                <h2><?= htmlspecialchars($settings['about_title']); ?></h2>
                
                <p>
                    <?= htmlspecialchars($settings['about_p1']); ?>
                </p>

                <p>
                    <?= htmlspecialchars($settings['about_p2']); ?>
                </p>

                <p>
                    <?= htmlspecialchars($settings['about_p3']); ?>
                </p>

                <a href="#tentang-detail" class="about-link" data-open-modal="modalAbout">
                    Selengkapnya tentang PPIP <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="about-visual">
                <div class="about-card-box">
                    <div class="pillar-item">
                        <div class="pillar-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="pillar-content">
                            <h4>Ekosistem Publikasi Terpadu</h4>
                            <p>Menghubungkan jurnal, buku, prosiding, dan data kepakaran dosen dalam satu tata kelola terintegrasi.</p>
                        </div>
                    </div>

                    <div class="pillar-item">
                        <div class="pillar-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <div class="pillar-content">
                            <h4>Standar Mutu & Integritas Ilmiah</h4>
                            <p>Mendampingi kepatuhan etika publikasi, peningkatan akreditasi SINTA, serta reputasi indeksasi global.</p>
                        </div>
                    </div>

                    <div class="pillar-item">
                        <div class="pillar-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="pillar-content">
                            <h4>Kemitraan & Kolaborasi Luas</h4>
                            <p>Membangun ruang pertukaran gagasan ilmiah lintas disiplin, perguruan tinggi, dan industri.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       LAYANAN DAN PORTAL KAMI (BENTO GRID - Basis Data)
       ========================================================================== -->
    <section class="services-section" id="layanan">
        <div class="container">
            <div class="section-header">
                <span class="pill-badge primary">
                    <i class="fas fa-cubes"></i> Gerbang Layanan
                </span>
                <h2>Layanan dan Portal Kami</h2>
                <p>Akses terpadu seluruh portal pendukung penerbitan, tata kelola jurnal, konferensi, dan prosiding ilmiah di lingkungan UIN Saizu Purwokerto.</p>
            </div>

            <div class="portal-grid">
                <?php if (!empty($portals)): ?>
                    <?php foreach ($portals as $p): ?>
                        <div class="portal-card">
                            <div class="portal-card-top">
                                <div class="portal-badge-wrap">
                                    <div class="portal-icon <?= htmlspecialchars($p['color_theme'] ?? 'green'); ?>">
                                        <i class="<?= htmlspecialchars($p['icon_class'] ?? 'fas fa-globe'); ?>"></i>
                                    </div>
                                    <span class="portal-tag"><?= htmlspecialchars($p['badge_tag'] ?? 'Portal Layanan'); ?></span>
                                </div>
                                <h3><?= htmlspecialchars($p['portal_name']); ?></h3>
                                <div class="portal-subtitle"><?= htmlspecialchars($p['subtitle'] ?? ''); ?></div>
                                <p>
                                    <?= htmlspecialchars($p['description']); ?>
                                </p>
                            </div>
                            <div class="portal-card-bottom">
                                <span class="portal-domain"><i class="fas fa-globe mr-1"></i> <?= htmlspecialchars($p['domain_label'] ?? parse_url($p['url'], PHP_URL_HOST)); ?></span>
                                <a href="<?= htmlspecialchars($p['url']); ?>" target="_blank" rel="noopener noreferrer" class="btn <?= ($p['color_theme'] == 'gold') ? 'btn-gold' : 'btn-primary'; ?> btn-sm">
                                    <?= htmlspecialchars($p['button_text'] ?? 'Kunjungi Portal'); ?> <i class="fas fa-external-link-alt ml-1"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       KINERJA PUBLIKASI SIVITAS AKADEMIKA (Basis Data)
       ========================================================================== -->
    <section class="performance-section" id="kinerja">
        <div class="container performance-grid">
            <div class="performance-text">
                <span class="pill-badge white">
                    <i class="fas fa-chart-pie"></i> <?= htmlspecialchars($settings['performance_badge']); ?>
                </span>
                <h2><?= htmlspecialchars($settings['performance_title']); ?></h2>
                <p>
                    <?= htmlspecialchars($settings['performance_lead']); ?>
                </p>

                <div class="performance-actions">
                    <a href="<?= base_url('dashboard/authors'); ?>" class="btn btn-gold btn-lg">
                        <i class="fas fa-tachometer-alt"></i> Lihat Kinerja Publikasi
                    </a>
                    <a href="<?= base_url('dashboard/authors'); ?>" class="performance-link">
                        Telusuri Direktori Akademisi <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="performance-visual">
                <a href="<?= base_url('dashboard/authors'); ?>" class="perf-card">
                    <div class="perf-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="perf-detail">
                        <h4>Direktori Peneliti & Dosen</h4>
                        <p>Profil kepakaran, SINTA Score, h-index Google Scholar, Scopus, dan WoS.</p>
                    </div>
                </a>

                <a href="<?= base_url('dashboard/scopus_sdgs'); ?>" class="perf-card">
                    <div class="perf-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="perf-detail">
                        <h4>Tren Publikasi & Sitasi Scopus</h4>
                        <p>Pemetaan sitasi dan artikel Scopus fakultas yang selaras dengan tema SDGs.</p>
                    </div>
                </a>

                <a href="<?= base_url('dashboard/scholar_sdgs'); ?>" class="perf-card">
                    <div class="perf-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="perf-detail">
                        <h4>Google Scholar SDGs Trend</h4>
                        <p>Grafik pertumbuhan sitasi dan jumlah publikasi sivitas akademika per tahun.</p>
                    </div>
                </a>

                <a href="<?= base_url('dashboard/jurnal_sinta'); ?>" class="perf-card">
                    <div class="perf-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="perf-detail">
                        <h4>Peringkat Jurnal Terakreditasi</h4>
                        <p>Distribusi akreditasi jurnal ilmiah UIN Saizu dari SINTA 1 hingga SINTA 6.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       INFORMASI DAN AGENDA (Basis Data)
       ========================================================================== -->
    <section class="news-section" id="informasi">
        <div class="container">
            <div class="section-header">
                <span class="pill-badge gold">
                    <i class="fas fa-bullhorn"></i> <?= htmlspecialchars($settings['agenda_badge']); ?>
                </span>
                <h2><?= htmlspecialchars($settings['agenda_title']); ?></h2>
                <p><?= htmlspecialchars($settings['agenda_lead']); ?></p>
            </div>

            <div class="news-grid">
                <?php if (!empty($agendas)): ?>
                    <?php foreach ($agendas as $ag): ?>
                        <div class="news-card">
                            <div>
                                <div class="news-header">
                                    <span class="news-category <?= htmlspecialchars($ag['category_class'] ?? 'jurnal'); ?>"><?= htmlspecialchars($ag['category']); ?></span>
                                    <span class="news-date"><i class="far fa-calendar-alt mr-1"></i> <?= htmlspecialchars($ag['event_date']); ?></span>
                                </div>
                                <h3><?= htmlspecialchars($ag['title']); ?></h3>
                                <p><?= htmlspecialchars($ag['description']); ?></p>
                            </div>
                            <div class="news-footer">
                                <span><?= htmlspecialchars($ag['link_text'] ?? 'Baca Selengkapnya'); ?></span>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="news-center-action">
                <a href="#semua-informasi" class="news-all-link" data-open-modal="modalInfo">
                    Lihat Semua Informasi <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       CALL TO ACTION (CTA - Basis Data)
       ========================================================================== -->
    <section class="cta-section" id="kolaborasi">
        <div class="container">
            <div class="cta-box">
                <h2><?= htmlspecialchars($settings['cta_title']); ?></h2>
                <p>
                    <?= htmlspecialchars($settings['cta_description']); ?>
                </p>
                <div class="btn-group" style="justify-content: center;">
                    <button type="button" class="btn btn-primary btn-lg" data-open-modal="modalKontak">
                        <i class="fas fa-envelope"></i> Hubungi Kami
                    </button>
                    <a href="<?= base_url('dashboard/authors'); ?>" class="btn btn-outline btn-lg">
                        <i class="fas fa-search"></i> Cari Kepakaran Dosen
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       DISCLAIMER RESMI UIN SAIZU
       ========================================================================== -->
    <section class="disclaimer-landing-section" id="disclaimer" style="padding: 90px 0 80px; background: #ffffff; border-top: 1px solid var(--border-light);">
        <div class="container">
            <div class="section-header text-center" style="max-width: 860px; margin: 0 auto 40px;">
                <span class="pill-badge gold">
                    <i class="fas fa-balance-scale"></i> Legalitas & Entitas Kelembagaan
                </span>
                <h2 class="section-title" style="font-size: 2.2rem; margin-top: 12px; margin-bottom: 12px;">Disclaimer Resmi UIN SAIZU</h2>
                <p class="section-desc" style="font-size: 1rem; color: var(--text-secondary); line-height: 1.7;">
                    Pernyataan resmi keabsahan nama institusi, kesinambungan sejarah transformasi kelembagaan, serta panduan variasi penamaan resmi untuk integrasi data publikasi ilmiah, Webometrics, dan sitasi akademik digital.
                </p>
            </div>

            <div style="background: var(--bg-subtle, #F8FAFC); border-radius: var(--radius-lg, 18px); padding: 36px 36px 32px; border: 1px solid var(--border-light); box-shadow: var(--shadow-sm);">
                
                <!-- Notice Perpres -->
                <div style="background: linear-gradient(135deg, rgba(4, 120, 87, 0.08) 0%, rgba(2, 132, 199, 0.08) 100%); border-left: 4px solid var(--primary); border-radius: var(--radius-md); padding: 20px 24px; margin-bottom: 24px;">
                    <div style="font-weight: 700; color: var(--navy-900); font-size: 1.05rem; margin-bottom: 6px; display: flex; align-items: center; gap: 8px;">
                        <i class="fas fa-certificate text-primary"></i> Dasar Penetapan Hukum Institusi
                    </div>
                    <p style="margin: 0; color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7;">
                        <strong>Universitas Islam Negeri Profesor Kiai Haji Saifuddin Zuhri Purwokerto</strong> merupakan nama resmi institusi sebagaimana ditetapkan berdasarkan <strong>Peraturan Presiden Republik Indonesia Nomor 41 Tahun 2021</strong>.
                    </p>
                </div>

                <p style="color: var(--text-secondary); font-size: 0.96rem; line-height: 1.7; margin-bottom: 20px;">
                    Dalam berbagai dokumen, publikasi, basis data, sistem pemeringkatan, mesin pencari, indeksasi ilmiah, dan rekam jejak digital, institusi ini dapat ditemukan dengan sejumlah variasi penamaan yang merujuk pada lembaga yang sama, antara lain:
                </p>

                <!-- 12 Variasi Nama Grid -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 12px; margin-bottom: 28px;">
                    <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                        <span style="width: 28px; height: 28px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">1</span>
                        <span style="font-size: 0.9rem; font-weight: 600; color: var(--navy-900);">Universitas Islam Negeri Profesor Kiai Haji Saifuddin Zuhri Purwokerto</span>
                    </div>
                    <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                        <span style="width: 28px; height: 28px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">2</span>
                        <span style="font-size: 0.9rem; font-weight: 600; color: var(--navy-900);">Universitas Islam Negeri Prof. K.H. Saifuddin Zuhri Purwokerto</span>
                    </div>
                    <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                        <span style="width: 28px; height: 28px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">3</span>
                        <span style="font-size: 0.9rem; font-weight: 600; color: var(--navy-900);">UIN Prof. K.H. Saifuddin Zuhri Purwokerto</span>
                    </div>
                    <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                        <span style="width: 28px; height: 28px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">4</span>
                        <span style="font-size: 0.9rem; font-weight: 600; color: var(--navy-900);">UIN SAIZU Purwokerto</span>
                    </div>
                    <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                        <span style="width: 28px; height: 28px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">5</span>
                        <span style="font-size: 0.9rem; font-weight: 600; color: var(--navy-900);">UIN Saizu</span>
                    </div>
                    <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                        <span style="width: 28px; height: 28px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">6</span>
                        <span style="font-size: 0.9rem; font-weight: 600; color: var(--navy-900);">UIN Saizu Purwokerto</span>
                    </div>
                    <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                        <span style="width: 28px; height: 28px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">7</span>
                        <span style="font-size: 0.9rem; font-weight: 600; color: var(--navy-900);">UIN Saifuddin Zuhri Purwokerto</span>
                    </div>
                    <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                        <span style="width: 28px; height: 28px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">8</span>
                        <span style="font-size: 0.9rem; font-weight: 600; color: var(--navy-900);">Universitas Islam Negeri Saifuddin Zuhri Purwokerto</span>
                    </div>
                    <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                        <span style="width: 28px; height: 28px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">9</span>
                        <span style="font-size: 0.9rem; font-weight: 600; color: var(--navy-900);">UIN Purwokerto</span>
                    </div>
                    <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                        <span style="width: 28px; height: 28px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">10</span>
                        <span style="font-size: 0.9rem; font-weight: 600; color: var(--navy-900);">State Islamic University Prof. K.H. Saifuddin Zuhri Purwokerto <small style="font-weight: 400; color: var(--text-muted);">(dan variasi bahasa Inggris)</small></span>
                    </div>
                    <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                        <span style="width: 28px; height: 28px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">11</span>
                        <span style="font-size: 0.9rem; font-weight: 600; color: var(--navy-900);">Institut Agama Islam Negeri Purwokerto (IAIN Purwokerto) <small style="font-weight: 400; color: var(--text-muted);">(nama sebelum universitas)</small></span>
                    </div>
                    <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                        <span style="width: 28px; height: 28px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">12</span>
                        <span style="font-size: 0.9rem; font-weight: 600; color: var(--navy-900);">Sekolah Tinggi Agama Islam Negeri Purwokerto (STAIN Purwokerto) <small style="font-weight: 400; color: var(--text-muted);">(nama periode awal)</small></span>
                    </div>
                </div>

                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7; margin-bottom: 20px;">
                    Seluruh variasi nama tersebut, sepanjang merujuk pada institusi yang berkedudukan di <strong>Purwokerto, Kabupaten Banyumas</strong>, merupakan bagian dari kesinambungan sejarah dan transformasi kelembagaan institusi yang sama, dan bukan merupakan perguruan tinggi yang berbeda.
                </p>

                <!-- Callout Highlight -->
                <div style="background: #FEF3C7; border: 1px solid #FDE68A; border-radius: var(--radius-md); padding: 16px 20px; color: #92400E; font-size: 0.92rem; line-height: 1.7; margin-bottom: 24px; display: flex; gap: 12px; align-items: flex-start;">
                    <i class="fas fa-info-circle" style="font-size: 1.25rem; color: #D97706; margin-top: 2px; flex-shrink: 0;"></i>
                    <div>
                        <strong>Penting untuk Kepentingan Pengumpulan & Integrasi Data:</strong><br>
                        Untuk kepentingan pengumpulan, verifikasi, integrasi, dan analisis data historis maupun terkini, termasuk data pemeringkatan perguruan tinggi, <strong>Webometrics</strong>, publikasi ilmiah, sitasi, afiliasi penulis, repository, website, backlink, indeksasi, dan rekam jejak akademik digital, seluruh variasi nama tersebut perlu dipertimbangkan sebagai <strong>satu entitas institusi</strong>, yaitu <strong>Universitas Islam Negeri Profesor Kiai Haji Saifuddin Zuhri Purwokerto (UIN SAIZU Purwokerto)</strong>.
                    </div>
                </div>

                <p style="color: var(--text-secondary); font-size: 0.92rem; line-height: 1.7; margin-bottom: 24px;">
                    Penggunaan nama lama seperti <em>IAIN Purwokerto</em> dan <em>STAIN Purwokerto</em> dalam dokumen atau basis data tertentu menunjukkan periode historis kelembagaan pada saat data tersebut diterbitkan, dan tidak menunjukkan keberadaan institusi yang berbeda.
                </p>

                <!-- Step Transformation -->
                <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 20px 24px; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
                    <div>
                        <div style="font-size: 0.82rem; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px;">
                            Dasar Transformasi Kelembagaan
                        </div>
                        <div style="font-size: 0.98rem; font-weight: 700; color: var(--navy-900);">
                            STAIN Purwokerto &rarr; IAIN Purwokerto &rarr; UIN SAIZU Purwokerto
                        </div>
                        <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 4px;">
                            Transformasi STAIN menjadi IAIN ditetapkan pada <strong>17 Oktober 2014</strong>, sedangkan IAIN menjadi UIN ditetapkan pada <strong>11 Mei 2021</strong>.
                        </div>
                    </div>
                    <div>
                        <a href="https://uinsaizu.ac.id/disclaimer" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-sm">
                            <i class="fas fa-external-link-alt mr-1"></i> uinsaizu.ac.id/disclaimer
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ==========================================================================
       FOOTER
       ========================================================================== -->
    <footer class="site-footer" id="kontak">
        <div class="container">
            <div class="footer-grid">
                <!-- Col 1: Brand -->
                <div class="footer-brand">
                    <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo UIN Saizu" class="brand-logo">
                    <h3><?= htmlspecialchars($settings['hero_title']); ?></h3>
                    <span><?= htmlspecialchars($settings['hero_subtitle']); ?></span>
                    <p>
                        Membangun ruang kolaborasi agar pengetahuan dapat dikembangkan, dipertukarkan, dan dimanfaatkan secara lebih luas bagi peradaban.
                    </p>
                </div>

                <!-- Col 2: Portal Layanan (Dinamis dari Basis Data) -->
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

                <!-- Col 3: Kinerja & Data -->
                <div class="footer-col">
                    <h4>Kinerja & Analitik</h4>
                    <ul class="footer-links">
                        <li><a href="<?= base_url('dashboard/authors'); ?>"><i class="fas fa-chevron-right"></i> Direktori Author & Dosen</a></li>
                        <li><a href="<?= base_url('dashboard/scopus_sdgs'); ?>"><i class="fas fa-chevron-right"></i> Sitasi Scopus Fakultas</a></li>
                        <li><a href="<?= base_url('dashboard/scholar_sdgs'); ?>"><i class="fas fa-chevron-right"></i> Sitasi Google Scholar</a></li>
                        <li><a href="<?= base_url('dashboard/jurnal_sinta'); ?>"><i class="fas fa-chevron-right"></i> Akreditasi SINTA</a></li>
                        <li><a href="<?= base_url('disclaimer'); ?>" style="color: var(--primary-light); font-weight: 600;"><i class="fas fa-balance-scale"></i> Disclaimer Resmi</a></li>
                        <li><a href="<?= base_url('sitemap'); ?>"><i class="fas fa-sitemap"></i> Peta Situs (Sitemap)</a></li>
                    </ul>
                </div>

                <!-- Col 4: Kontak (Dinamis dari Basis Data) -->
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
                    <div class="footer-contact-item">
                        <i class="fas fa-clock"></i>
                        <span><?= htmlspecialchars($settings['contact_hours']); ?></span>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?= date('Y'); ?> <?= htmlspecialchars($settings['hero_title']); ?> <?= htmlspecialchars($settings['hero_subtitle']); ?>. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="<?= base_url('ppip/beranda'); ?>" data-section="beranda" class="nav-section-link">Beranda</a>
                    <a href="<?= base_url('ppip/tentang'); ?>" data-section="tentang" class="nav-section-link">Tentang</a>
                    <a href="<?= base_url('ppip/layanan'); ?>" data-section="layanan" class="nav-section-link">Layanan</a>
                    <a href="<?= base_url('disclaimer'); ?>">Disclaimer</a>
                    <a href="<?= base_url('sitemap'); ?>"><i class="fas fa-sitemap mr-1"></i> Peta Situs</a>
                    <a href="<?= base_url('sitemap.xml'); ?>" target="_blank"><i class="fas fa-code mr-1"></i> XML</a>
                    <a href="<?= base_url('auth'); ?>">Login Pengelola</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ==========================================================================
       MODALS
       ========================================================================== -->

    <!-- Modal Tentang PPIP -->
    <div class="ppip-modal" id="modalAbout">
        <div class="ppip-modal-card">
            <button type="button" class="ppip-modal-close" aria-label="Close modal">&times;</button>
            <div style="margin-bottom: 20px;">
                <span class="pill-badge primary" style="margin-bottom: 10px;">Profil Lengkap</span>
                <h3><?= htmlspecialchars($settings['about_title']); ?></h3>
                <p style="color: var(--primary); font-weight: 600; font-size: 0.9rem;"><?= htmlspecialchars($settings['hero_subtitle']); ?></p>
            </div>
            <div style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8;">
                <p style="margin-bottom: 14px;">
                    <?= htmlspecialchars($settings['about_p1']); ?>
                </p>
                <h4 style="font-size: 1.05rem; margin: 16px 0 8px 0; color: var(--navy-900);">Tugas Pokok & Fungsi Utama:</h4>
                <ul style="padding-left: 20px; margin-bottom: 16px;">
                    <li><strong>Pengelolaan Jurnal Ilmiah (Griya Jurnal):</strong> Standarisasi OJS, bimbingan akreditasi ARJUNA (SINTA), dan indeksasi internasional (DOAJ, Scopus, WoS).</li>
                    <li><strong>Penerbitan Buku (Saizu Publisher):</strong> Penerbitan karya sivitas berupa buku referensi, monograf, buku ajar ber-ISBN dengan standar tata kelola profesional.</li>
                    <li><strong>Pengelolaan Konferensi & Prosiding:</strong> Fasilitasi penyelenggaraan seminar/konferensi ilmiah dan penerbitan prosiding bereputasi.</li>
                    <li><strong>Monitoring & Evaluasi Kinerja Publikasi:</strong> Inventarisasi profil author dosen, skor SINTA, data sitasi Scopus dan Google Scholar.</li>
                </ul>
                <p>
                    Melalui semangat <em>"<?= htmlspecialchars($settings['hero_tagline']); ?>"</em>, PPIP berkomitmen menjadi jembatan ilmu pengetahuan dari kampus menuju peradaban dunia.
                </p>
            </div>
            <div style="margin-top: 24px; text-align: right;">
                <button type="button" class="btn btn-primary btn-sm" data-close-modal>Tutup</button>
            </div>
        </div>
    </div>

    <!-- Modal Hubungi Kami (Basis Data) -->
    <div class="ppip-modal" id="modalKontak">
        <div class="ppip-modal-card">
            <button type="button" class="ppip-modal-close" aria-label="Close modal">&times;</button>
            <div style="margin-bottom: 20px;">
                <span class="pill-badge gold" style="margin-bottom: 10px;">Layanan Kolaborasi</span>
                <h3>Hubungi Tim PPIP LPPM</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Silakan hubungi kami untuk konsultasi publikasi, pendampingan jurnal, atau penerbitan buku.</p>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 24px;">
                <div style="padding: 16px; background: var(--bg-subtle); border-radius: var(--radius-md); border: 1px solid var(--border-light); display: flex; gap: 14px; align-items: center;">
                    <div style="width: 44px; height: 44px; border-radius: 50%; background: rgba(4, 120, 87, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <div>
                        <div style="font-weight: 700; color: var(--navy-900); font-size: 0.95rem;">Kantor Pusat</div>
                        <div style="font-size: 0.85rem; color: var(--text-secondary);"><?= htmlspecialchars($settings['contact_address']); ?></div>
                    </div>
                </div>

                <div style="padding: 16px; background: var(--bg-subtle); border-radius: var(--radius-md); border: 1px solid var(--border-light); display: flex; gap: 14px; align-items: center;">
                    <div style="width: 44px; height: 44px; border-radius: 50%; background: rgba(2, 132, 199, 0.1); color: #0284C7; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <div style="font-weight: 700; color: var(--navy-900); font-size: 0.95rem;">Email Resmi</div>
                        <div style="font-size: 0.85rem; color: var(--text-secondary);"><a href="mailto:<?= htmlspecialchars($settings['contact_email']); ?>"><?= htmlspecialchars($settings['contact_email']); ?></a></div>
                    </div>
                </div>

                <div style="padding: 16px; background: var(--bg-subtle); border-radius: var(--radius-md); border: 1px solid var(--border-light); display: flex; gap: 14px; align-items: center;">
                    <div style="width: 44px; height: 44px; border-radius: 50%; background: rgba(37, 211, 102, 0.15); color: #25D366; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <div style="font-weight: 700; color: var(--navy-900); font-size: 0.95rem;">Jam Layanan Konsultasi</div>
                        <div style="font-size: 0.85rem; color: var(--text-secondary);"><?= htmlspecialchars($settings['contact_hours']); ?></div>
                    </div>
                </div>
            </div>

            <div style="text-align: right;">
                <button type="button" class="btn btn-primary btn-sm" data-close-modal>Mengerti</button>
            </div>
        </div>
    </div>

    <!-- Modal Semua Informasi -->
    <div class="ppip-modal" id="modalInfo">
        <div class="ppip-modal-card">
            <button type="button" class="ppip-modal-close" aria-label="Close modal">&times;</button>
            <div style="margin-bottom: 20px;">
                <span class="pill-badge gold" style="margin-bottom: 10px;">Agenda & Pengumuman</span>
                <h3><?= htmlspecialchars($settings['agenda_title']); ?></h3>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Rangkaian agenda pembinaan publikasi, konferensi, dan penerbitan buku.</p>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 14px; font-size: 0.92rem;">
                <?php if (!empty($agendas)): ?>
                    <?php foreach ($agendas as $ag): ?>
                        <div style="border-left: 3px solid var(--primary); padding-left: 12px;">
                            <div style="font-weight: 700; color: var(--navy-900);"><?= htmlspecialchars($ag['title']); ?></div>
                            <div style="font-size: 0.82rem; color: var(--text-muted);"><?= htmlspecialchars($ag['description']); ?></div>
                            <div style="font-size: 0.78rem; color: var(--primary); font-weight: 600; margin-top: 2px;">
                                <i class="far fa-calendar-alt mr-1"></i> <?= htmlspecialchars($ag['event_date']); ?> &bull; Kategori: <?= htmlspecialchars($ag['category']); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div style="margin-top: 24px; text-align: right;">
                <button type="button" class="btn btn-primary btn-sm" data-close-modal>Tutup</button>
            </div>
        </div>
    </div>

    <script>
        window.PPIP_CONFIG = {
            baseUrl: '<?= rtrim(base_url(), "/"); ?>',
            sectionBaseUrl: '<?= rtrim(base_url("ppip"), "/"); ?>',
            activeSection: '<?= htmlspecialchars($active_section ?? "beranda"); ?>'
        };
    </script>
    <!-- Custom Landing Page JS (Isolated in assets/landing/) -->
    <script src="<?= base_url('assets/landing/js/landing.js?v=' . (file_exists(FCPATH . 'assets/landing/js/landing.js') ? filemtime(FCPATH . 'assets/landing/js/landing.js') : time())); ?>"></script>
</body>
</html>
