<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title); ?></title>
    <meta name="description" content="Disclaimer Resmi UIN SAIZU - Kesinambungan sejarah, transformasi kelembagaan, dan variasi penamaan resmi institusi Universitas Islam Negeri Profesor Kiai Haji Saifuddin Zuhri Purwokerto.">
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/logo.png'); ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">

    <!-- Custom Landing Page CSS with Cache Buster -->
    <link rel="stylesheet" href="<?= base_url('assets/landing/css/landing.css?v=' . (file_exists(FCPATH . 'assets/landing/css/landing.css') ? filemtime(FCPATH . 'assets/landing/css/landing.css') : time())); ?>">

    <style>
        .disclaimer-hero {
            background: linear-gradient(135deg, #064E3B 0%, #047857 60%, #0B1528 100%);
            color: #ffffff;
            padding: 130px 0 60px;
            position: relative;
            overflow: hidden;
        }
        .disclaimer-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.12) 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.5;
        }
        .disclaimer-hero .container {
            position: relative;
            z-index: 2;
        }
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 16px;
        }
        .breadcrumb a {
            color: #A7F3D0;
            text-decoration: none;
            transition: var(--transition);
        }
        .breadcrumb a:hover {
            color: #ffffff;
            text-decoration: underline;
        }
        .disclaimer-hero-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2.6rem;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }
        .disclaimer-hero-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 820px;
            line-height: 1.6;
        }

        .disclaimer-body {
            padding: 50px 0 80px;
            background: var(--bg-subtle, #F8FAFC);
        }

        .disclaimer-card {
            background: #ffffff;
            border-radius: var(--radius-lg, 16px);
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-light, #E2E8F0);
            margin-bottom: 30px;
        }

        .legal-notice-box {
            background: linear-gradient(135deg, rgba(4, 120, 87, 0.08) 0%, rgba(2, 132, 199, 0.08) 100%);
            border-left: 4px solid var(--primary, #047857);
            border-radius: var(--radius-md, 12px);
            padding: 24px;
            margin-bottom: 32px;
        }
        .legal-notice-box h4 {
            color: var(--navy-900, #0B1528);
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .legal-notice-box p {
            color: var(--text-secondary, #475569);
            font-size: 0.98rem;
            line-height: 1.7;
            margin: 0;
        }

        .disclaimer-text {
            color: var(--text-secondary, #334155);
            font-size: 1.02rem;
            line-height: 1.8;
            margin-bottom: 24px;
        }

        /* 12 Variasi Nama Grid */
        .aliases-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 14px;
            margin: 24px 0 36px;
        }
        .alias-item {
            background: #ffffff;
            border: 1px solid var(--border-light, #E2E8F0);
            border-radius: var(--radius-md, 10px);
            padding: 14px 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: all 0.2s ease;
        }
        .alias-item:hover {
            border-color: var(--primary, #047857);
            box-shadow: 0 4px 12px rgba(4, 120, 87, 0.08);
            transform: translateY(-2px);
        }
        .alias-number {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(4, 120, 87, 0.1);
            color: var(--primary, #047857);
            font-weight: 700;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .alias-name {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--navy-900, #0F172A);
            line-height: 1.4;
        }

        /* Timeline Transformasi */
        .timeline-wrapper {
            margin: 36px 0;
            background: #ffffff;
            border: 1px solid var(--border-light, #E2E8F0);
            border-radius: var(--radius-lg, 16px);
            padding: 30px;
        }
        .timeline-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--navy-900, #0B1528);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .timeline-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            position: relative;
        }
        .timeline-step {
            position: relative;
            padding: 20px;
            background: var(--bg-subtle, #F8FAFC);
            border-radius: var(--radius-md, 12px);
            border: 1px solid var(--border-light, #E2E8F0);
        }
        .timeline-step.active {
            background: rgba(4, 120, 87, 0.05);
            border-color: var(--primary, #047857);
        }
        .step-badge {
            display: inline-block;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .step-badge.legacy {
            background: #E2E8F0;
            color: #475569;
        }
        .step-badge.intermediate {
            background: #BAE6FD;
            color: #0369A1;
        }
        .step-badge.current {
            background: rgba(4, 120, 87, 0.15);
            color: #047857;
        }
        .step-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--navy-900, #0F172A);
            margin-bottom: 6px;
        }
        .step-desc {
            font-size: 0.88rem;
            color: var(--text-muted, #64748B);
            line-height: 1.5;
        }

        .highlight-box {
            background: #FEF3C7;
            border: 1px solid #FDE68A;
            border-radius: var(--radius-md, 12px);
            padding: 20px 24px;
            color: #92400E;
            font-size: 0.95rem;
            line-height: 1.7;
            margin: 28px 0;
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }
        .highlight-box i {
            font-size: 1.4rem;
            color: #D97706;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .action-bar {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 36px;
            padding-top: 28px;
            border-top: 1px solid var(--border-light, #E2E8F0);
        }

        @media (max-width: 768px) {
            .disclaimer-hero {
                padding: 110px 0 40px;
            }
            .disclaimer-hero-title {
                font-size: 2rem;
            }
            .disclaimer-card {
                padding: 24px;
            }
            .aliases-grid {
                grid-template-columns: 1fr;
            }
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
                    <li><a href="<?= base_url('ppip/beranda'); ?>">Beranda</a></li>
                    <li><a href="<?= base_url('ppip/tentang'); ?>">Tentang</a></li>
                    <li><a href="<?= base_url('ppip/layanan'); ?>">Layanan & Portal</a></li>
                    <li><a href="<?= base_url('ppip/kinerja'); ?>">Kinerja Publikasi</a></li>
                    <li><a href="<?= base_url('ppip/informasi'); ?>">Informasi</a></li>
                    <li><a href="<?= base_url('ppip/kontak'); ?>">Kontak</a></li>
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
       HERO BANNER
       ========================================================================== -->
    <section class="disclaimer-hero">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?= base_url('ppip'); ?>"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <span>Disclaimer Resmi UIN SAIZU</span>
            </div>

            <span class="pill-badge" style="background: rgba(255, 255, 255, 0.15); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.3); margin-bottom: 14px; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fas fa-balance-scale"></i> Legalitas & Entitas Kelembagaan
            </span>

            <h1 class="disclaimer-hero-title">Disclaimer Resmi UIN SAIZU</h1>
            <p class="disclaimer-hero-subtitle">
                Pernyataan resmi keabsahan nama institusi, kontinuitas transformasi kelembagaan, dan panduan variasi penamaan untuk indeksasi publikasi ilmiah serta rekam jejak digital.
            </p>
        </div>
    </section>

    <!-- ==========================================================================
       DISCLAIMER BODY CONTENT
       ========================================================================== -->
    <main class="disclaimer-body">
        <div class="container">
            <div class="disclaimer-card">

                <div class="legal-notice-box">
                    <h4>
                        <i class="fas fa-certificate text-primary"></i>
                        Dasar Penetapan Hukum Institusi
                    </h4>
                    <p>
                        <strong>Universitas Islam Negeri Profesor Kiai Haji Saifuddin Zuhri Purwokerto</strong> merupakan nama resmi institusi sebagaimana ditetapkan berdasarkan <strong>Peraturan Presiden Republik Indonesia Nomor 41 Tahun 2021</strong>.
                    </p>
                </div>

                <div class="disclaimer-text">
                    Dalam berbagai dokumen, publikasi, basis data, sistem pemeringkatan, mesin pencari, indeksasi ilmiah, dan rekam jejak digital, institusi ini dapat ditemukan dengan sejumlah variasi penamaan yang merujuk pada lembaga yang sama, antara lain:
                </div>

                <!-- 12 Variasi Nama -->
                <div class="aliases-grid">
                    <div class="alias-item">
                        <div class="alias-number">1</div>
                        <div class="alias-name">Universitas Islam Negeri Profesor Kiai Haji Saifuddin Zuhri Purwokerto</div>
                    </div>
                    <div class="alias-item">
                        <div class="alias-number">2</div>
                        <div class="alias-name">Universitas Islam Negeri Prof. K.H. Saifuddin Zuhri Purwokerto</div>
                    </div>
                    <div class="alias-item">
                        <div class="alias-number">3</div>
                        <div class="alias-name">UIN Prof. K.H. Saifuddin Zuhri Purwokerto</div>
                    </div>
                    <div class="alias-item">
                        <div class="alias-number">4</div>
                        <div class="alias-name">UIN SAIZU Purwokerto</div>
                    </div>
                    <div class="alias-item">
                        <div class="alias-number">5</div>
                        <div class="alias-name">UIN Saizu</div>
                    </div>
                    <div class="alias-item">
                        <div class="alias-number">6</div>
                        <div class="alias-name">UIN Saizu Purwokerto</div>
                    </div>
                    <div class="alias-item">
                        <div class="alias-number">7</div>
                        <div class="alias-name">UIN Saifuddin Zuhri Purwokerto</div>
                    </div>
                    <div class="alias-item">
                        <div class="alias-number">8</div>
                        <div class="alias-name">Universitas Islam Negeri Saifuddin Zuhri Purwokerto</div>
                    </div>
                    <div class="alias-item">
                        <div class="alias-number">9</div>
                        <div class="alias-name">UIN Purwokerto</div>
                    </div>
                    <div class="alias-item">
                        <div class="alias-number">10</div>
                        <div class="alias-name">State Islamic University Prof. K.H. Saifuddin Zuhri Purwokerto <span style="font-weight: 400; color: var(--text-muted);">(dan variasi penamaan dalam bahasa Inggris)</span></div>
                    </div>
                    <div class="alias-item">
                        <div class="alias-number">11</div>
                        <div class="alias-name">Institut Agama Islam Negeri Purwokerto (IAIN Purwokerto) <span style="font-weight: 400; color: var(--text-muted);">(nama institusi sebelum perubahan bentuk menjadi universitas)</span></div>
                    </div>
                    <div class="alias-item">
                        <div class="alias-number">12</div>
                        <div class="alias-name">Sekolah Tinggi Agama Islam Negeri Purwokerto (STAIN Purwokerto) <span style="font-weight: 400; color: var(--text-muted);">(nama institusi pada periode sebelumnya)</span></div>
                    </div>
                </div>

                <div class="disclaimer-text">
                    Seluruh variasi nama tersebut, sepanjang merujuk pada institusi yang berkedudukan di <strong>Purwokerto, Kabupaten Banyumas</strong>, merupakan bagian dari kesinambungan sejarah dan transformasi kelembagaan institusi yang sama, dan bukan merupakan perguruan tinggi yang berbeda.
                </div>

                <div class="highlight-box">
                    <i class="fas fa-info-circle"></i>
                    <div>
                        <strong>Penting untuk Kepentingan Integrasi Data & Sitasi:</strong><br>
                        Oleh karena itu, untuk kepentingan pengumpulan, verifikasi, integrasi, dan analisis data historis maupun terkini, termasuk data pemeringkatan perguruan tinggi, <strong>Webometrics</strong>, publikasi ilmiah, sitasi, afiliasi penulis, repository, website, backlink, indeksasi, dan rekam jejak akademik digital, seluruh variasi nama tersebut perlu dipertimbangkan sebagai <strong>satu entitas institusi</strong>, yaitu <strong>Universitas Islam Negeri Profesor Kiai Haji Saifuddin Zuhri Purwokerto (UIN SAIZU Purwokerto)</strong>.
                    </div>
                </div>

                <div class="disclaimer-text">
                    Penggunaan nama lama seperti <em>IAIN Purwokerto</em> dan <em>STAIN Purwokerto</em> dalam dokumen atau basis data tertentu menunjukkan periode historis kelembagaan pada saat data tersebut diterbitkan, dan tidak menunjukkan keberadaan institusi yang berbeda.
                </div>

                <!-- Timeline Transformasi Kelembagaan -->
                <div class="timeline-wrapper">
                    <div class="timeline-title">
                        <i class="fas fa-history text-primary"></i>
                        Dasar Transformasi Kelembagaan
                    </div>

                    <div style="font-size: 1.05rem; font-weight: 700; color: var(--primary); margin-bottom: 20px;">
                        STAIN Purwokerto &rarr; IAIN Purwokerto &rarr; Universitas Islam Negeri Profesor Kiai Haji Saifuddin Zuhri Purwokerto (UIN SAIZU Purwokerto)
                    </div>

                    <div class="timeline-steps">
                        <div class="timeline-step">
                            <span class="step-badge legacy">Fase Awal</span>
                            <div class="step-title">STAIN Purwokerto</div>
                            <div class="step-desc">
                                Sekolah Tinggi Agama Islam Negeri Purwokerto yang menjadi fondasi awal pengembangan keilmuan Islam di wilayah Banyumas.
                            </div>
                        </div>

                        <div class="timeline-step">
                            <span class="step-badge intermediate">17 Oktober 2014</span>
                            <div class="step-title">IAIN Purwokerto</div>
                            <div class="step-desc">
                                Transformasi STAIN menjadi Institut Agama Islam Negeri (IAIN) Purwokerto secara hukum ditetapkan pada 17 Oktober 2014.
                            </div>
                        </div>

                        <div class="timeline-step active">
                            <span class="step-badge current">11 Mei 2021 &bull; Resmi</span>
                            <div class="step-title">UIN SAIZU Purwokerto</div>
                            <div class="step-desc">
                                Transformasi IAIN menjadi Universitas Islam Negeri (UIN) ditetapkan secara hukum pada 11 Mei 2021 melalui Perpres No. 41 Tahun 2021.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="action-bar">
                    <a href="<?= base_url('ppip'); ?>" class="btn btn-primary">
                        <i class="fas fa-home"></i> Kembali ke Beranda
                    </a>
                    <a href="<?= base_url('dashboard/authors'); ?>" class="btn btn-outline">
                        <i class="fas fa-users"></i> Direktori Author & Afiliasi
                    </a>
                    <a href="<?= base_url('sitemap'); ?>" class="btn btn-outline">
                        <i class="fas fa-sitemap"></i> Peta Situs (Sitemap)
                    </a>
                    <a href="https://uinsaizu.ac.id/disclaimer" target="_blank" rel="noopener noreferrer" class="btn btn-outline" style="margin-left: auto;">
                        <i class="fas fa-external-link-alt"></i> Versi Utama uinsaizu.ac.id
                    </a>
                </div>

            </div>
        </div>
    </main>

    <!-- ==========================================================================
       FOOTER
       ========================================================================== -->
    <footer class="site-footer">
        <div class="container footer-inner">
            <div class="footer-grid">
                <!-- Col 1: Brand & Profil -->
                <div class="footer-col brand-col">
                    <div class="footer-brand">
                        <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo UIN Saizu" class="footer-logo">
                        <div class="footer-brand-text">
                            <h3>PPIP UIN SAIZU</h3>
                            <span>LPPM UIN Saizu Purwokerto</span>
                        </div>
                    </div>
                    <p class="footer-desc">
                        <?= htmlspecialchars($settings['about_p1']); ?>
                    </p>
                    <div class="footer-socials">
                        <a href="https://instagram.com/uinsaizu_official" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com/@UINSAIZU" target="_blank" rel="noopener" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="https://facebook.com/uinsaizu" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>

                <!-- Col 2: Portal Layanan -->
                <div class="footer-col">
                    <h4>Portal Layanan Utama</h4>
                    <ul class="footer-links">
                        <?php if (!empty($portals)): ?>
                            <?php foreach (array_slice($portals, 0, 5) as $pt): ?>
                                <li><a href="<?= htmlspecialchars($pt['url']); ?>" target="_blank" rel="noopener"><i class="fas fa-chevron-right"></i> <?= htmlspecialchars($pt['name']); ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Col 3: Kinerja & Data -->
                <div class="footer-col">
                    <h4>Kinerja & Legalitas</h4>
                    <ul class="footer-links">
                        <li><a href="<?= base_url('dashboard/authors'); ?>"><i class="fas fa-chevron-right"></i> Direktori Author & Dosen</a></li>
                        <li><a href="<?= base_url('dashboard/scopus_sdgs'); ?>"><i class="fas fa-chevron-right"></i> Sitasi Scopus Fakultas</a></li>
                        <li><a href="<?= base_url('dashboard/scholar_sdgs'); ?>"><i class="fas fa-chevron-right"></i> Sitasi Google Scholar</a></li>
                        <li><a href="<?= base_url('disclaimer'); ?>" style="color: var(--primary-light); font-weight: 700;"><i class="fas fa-balance-scale"></i> Disclaimer Resmi UIN SAIZU</a></li>
                        <li><a href="<?= base_url('sitemap'); ?>"><i class="fas fa-sitemap"></i> Peta Situs (Sitemap)</a></li>
                    </ul>
                </div>

                <!-- Col 4: Kontak -->
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
                    <a href="<?= base_url('ppip/beranda'); ?>">Beranda</a>
                    <a href="<?= base_url('ppip/tentang'); ?>">Tentang</a>
                    <a href="<?= base_url('ppip/layanan'); ?>">Layanan</a>
                    <a href="<?= base_url('disclaimer'); ?>" style="font-weight: 600;">Disclaimer</a>
                    <a href="<?= base_url('sitemap'); ?>"><i class="fas fa-sitemap mr-1"></i> Peta Situs</a>
                    <a href="<?= base_url('sitemap.xml'); ?>" target="_blank"><i class="fas fa-code mr-1"></i> XML</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Nav Toggle JS -->
    <script>
        const mobileToggle = document.getElementById('mobileToggle');
        const navLinks = document.getElementById('navLinks');
        if (mobileToggle && navLinks) {
            mobileToggle.addEventListener('click', function () {
                navLinks.classList.toggle('active');
                const icon = mobileToggle.querySelector('i');
                if (icon) {
                    if (navLinks.classList.contains('active')) {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-times');
                    } else {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                }
            });
        }
    </script>
</body>
</html>
