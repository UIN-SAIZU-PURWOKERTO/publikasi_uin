<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card card-outline card-success">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-sliders-h mr-2 text-success"></i> Pengaturan Konten Portal PPIP
                </h3>
                <div class="card-tools ml-auto">
                    <a href="<?= base_url('ppip'); ?>" target="_blank" class="btn btn-sm btn-outline-info">
                        <i class="fas fa-external-link-alt mr-1"></i> Pratinjau Portal
                    </a>
                </div>
            </div>
            
            <form action="" method="post" id="formSettings" novalidate>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="active_tab" id="active_tab" value="<?= html_escape($this->input->get('tab') ? '#' . $this->input->get('tab') : '#tab_hero'); ?>">
                
                <div class="card-body">
                    <ul class="nav nav-tabs" id="settingsTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active font-weight-bold" id="hero-tab" data-toggle="pill" href="#tab_hero" role="tab">
                                <i class="fas fa-star text-warning mr-1"></i> 1. Banner / Hero Section
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" id="about-tab" data-toggle="pill" href="#tab_about" role="tab">
                                <i class="fas fa-university text-success mr-1"></i> 2. Tentang PPIP
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" id="stats-tab" data-toggle="pill" href="#tab_stats" role="tab">
                                <i class="fas fa-chart-line text-info mr-1"></i> 3. Angka Metrik Banner
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" id="contact-tab" data-toggle="pill" href="#tab_contact" role="tab">
                                <i class="fas fa-phone-alt text-danger mr-1"></i> 4. Kontak & Jam Kerja
                            </a>
                        </li>
                    </ul>
                    
                    <div class="tab-content pt-4" id="settingsTabContent">
                        <!-- TAB 1: HERO -->
                        <div class="tab-pane fade show active" id="tab_hero" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold">Judul Utama (H1)</label>
                                    <input type="text" name="hero_title" class="form-control" value="<?= html_escape($settings['hero_title'] ?? 'Pusat Publikasi Ilmiah dan Penerbitan'); ?>">
                                    <small class="form-text text-muted">Contoh: Pusat Publikasi Ilmiah dan Penerbitan</small>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold">Sub-Judul Lembaga</label>
                                    <input type="text" name="hero_subtitle" class="form-control" value="<?= html_escape($settings['hero_subtitle'] ?? 'LPPM UIN Prof. K.H. Saifuddin Zuhri Purwokerto'); ?>">
                                    <small class="form-text text-muted">Contoh: LPPM UIN Prof. K.H. Saifuddin Zuhri Purwokerto</small>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Tagline Utama</label>
                                <input type="text" name="hero_tagline" class="form-control font-weight-bold" value="<?= html_escape($settings['hero_tagline'] ?? 'Menguatkan Publikasi, Menghubungkan Gagasan, Memperluas Manfaat Pengetahuan'); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi Ringkas Banner</label>
                                <textarea name="hero_description" rows="4" class="form-control"><?= html_escape($settings['hero_description'] ?? ($settings['hero_desc'] ?? '')); ?></textarea>
                            </div>
                        </div>
                        
                        <!-- TAB 2: ABOUT -->
                        <div class="tab-pane fade" id="tab_about" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold">Judul Bagian Tentang</label>
                                    <input type="text" name="about_title" class="form-control" value="<?= html_escape($settings['about_title'] ?? 'Pusat Publikasi Ilmiah dan Penerbitan (PPIP)'); ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold">Badge Kategori</label>
                                    <input type="text" name="about_badge" class="form-control" value="<?= html_escape($settings['about_badge'] ?? 'Tentang Kami'); ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Paragraf 1 (Profil Lembaga)</label>
                                <textarea name="about_p1" rows="3" class="form-control"><?= html_escape($settings['about_p1'] ?? ($settings['about_text_1'] ?? '')); ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Paragraf 2 (Griya Jurnal & Ekosistem)</label>
                                <textarea name="about_p2" rows="3" class="form-control"><?= html_escape($settings['about_p2'] ?? ($settings['about_text_2'] ?? '')); ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Paragraf 3 (Saizu Press & Diseminasi)</label>
                                <textarea name="about_p3" rows="3" class="form-control"><?= html_escape($settings['about_p3'] ?? ($settings['about_text_3'] ?? '')); ?></textarea>
                            </div>
                        </div>
                        
                        <!-- TAB 3: STATS -->
                        <div class="tab-pane fade" id="tab_stats" role="tabpanel">
                            <div class="alert alert-info">
                                <i class="icon fas fa-info-circle"></i>
                                <strong>Informasi Otomasi Data:</strong>
                                Jumlah <strong>Jurnal Ilmiah</strong> dan <strong>Author/Dosen</strong> dihitung otomatis secara <em>real-time</em> dari database sistem publikasi. Di bawah ini Anda dapat mengatur angka terdaftar untuk <strong>Buku Ber-ISBN</strong> dan <strong>Prosiding Ilmiah</strong>.
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold"><i class="fas fa-book text-warning mr-1"></i> Jumlah Buku Ber-ISBN</label>
                                    <input type="number" name="manual_books_count" class="form-control" value="<?= html_escape($settings['manual_books_count'] ?? '150'); ?>" min="0">
                                    <small class="form-text text-muted">Ditampilkan pada kotak statistik Buku Ber-ISBN di banner utama.</small>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold"><i class="fas fa-file-signature text-purple mr-1"></i> Jumlah Prosiding Ilmiah</label>
                                    <input type="number" name="manual_proceedings_count" class="form-control" value="<?= html_escape($settings['manual_proceedings_count'] ?? '12'); ?>" min="0">
                                    <small class="form-text text-muted">Ditampilkan pada kotak statistik Prosiding Ilmiah di banner utama.</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- TAB 4: CONTACT -->
                        <div class="tab-pane fade" id="tab_contact" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold"><i class="fas fa-envelope mr-1 text-primary"></i> Email Resmi</label>
                                    <input type="email" name="contact_email" class="form-control" value="<?= html_escape($settings['contact_email'] ?? 'ppip@uinsaizu.ac.id'); ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold"><i class="fas fa-phone mr-1 text-success"></i> Telepon / WhatsApp</label>
                                    <input type="text" name="contact_phone" class="form-control" value="<?= html_escape($settings['contact_phone'] ?? '(0281) 635624'); ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold"><i class="fas fa-map-marker-alt mr-1 text-danger"></i> Alamat Kantor PPIP</label>
                                <textarea name="contact_address" rows="2" class="form-control"><?= html_escape($settings['contact_address'] ?? 'Gedung LPPM UIN Prof. K.H. Saifuddin Zuhri, Jl. A. Yani No. 40A, Purwokerto, Jawa Tengah 53126'); ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold"><i class="fas fa-clock mr-1 text-warning"></i> Jam Layanan</label>
                                <input type="text" name="contact_hours" class="form-control" value="<?= html_escape($settings['contact_hours'] ?? 'Senin - Jumat: 08:00 - 16:00 WIB'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-light">
                    <button type="submit" class="btn btn-primary font-weight-bold">
                        <i class="fas fa-save mr-1"></i> Simpan Perubahan Pengaturan
                    </button>
                    <a href="<?= base_url('kelola_ppip/portals'); ?>" class="btn btn-default">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Layanan & Portal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    if (typeof jQuery !== 'undefined') {
        $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href");
            $('#active_tab').val(target);
        });

        var urlParams = new URLSearchParams(window.location.search);
        var activeTab = urlParams.get('tab');
        if (activeTab) {
            $('#settingsTab a[href="#' + activeTab + '"]').tab('show');
        }
    }
});
</script>

