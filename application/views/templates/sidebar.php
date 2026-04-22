<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url('assets/images/logo.png') ?>" class="brand-image img-circle elevation-3"
            style="opacity:.8">
        <span class="brand-text font-weight-light text-lg">UIN SAIZU</span>
    </a>

    <div class="sidebar">

        <!-- User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/images/user.png') ?>" class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user_info['name'] ?></a>
            </div>
        </div>

        <!-- Search -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar"><i class="fas fa-search fa-fw"></i></button>
                </div>
            </div>
        </div>

        <?php  
            // ==============================
            // 👇 LANGSUNG QUERY DI VIEW
            // ==============================
            $ci =& get_instance();
            $ci->db->order_by('urut', 'ASC');
            $menus = $ci->db->get_where('menu', ['aktif' => 1])->result_array();
        ?>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php 
                $chart_urls = ['dashboard/affiliations', 'dashboard/scopus_sdgs', 'dashboard/scholar_sdgs', 'dashboard/jurnal_sinta'];
                $chart_menus = [];
                foreach ($menus as $m) {
                    if (in_array($m['url'], $chart_urls)) {
                        $chart_menus[] = $m;
                    }
                }
                
                // Tambahkan menu baru ke list chart jika belum ada di database
                $found_jurnal_sinta = false;
                foreach($chart_menus as $cm) {
                    if($cm['url'] == 'dashboard/jurnal_sinta') $found_jurnal_sinta = true;
                }
                if(!$found_jurnal_sinta) {
                    $chart_menus[] = [
                        'nama' => 'Grafik Jurnal Sinta',
                        'url' => 'dashboard/jurnal_sinta',
                        'icon' => 'fas fa-chart-bar'
                    ];
                }
                ?>

                <?php foreach ($menus as $m): ?>
                    <?php if (in_array($m['url'], $chart_urls)) continue; ?>

                    <?php if ($m['icon'] == 'header'): ?>
                        <li class="nav-header"><?= strtoupper($m['nama']) ?></li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="<?= base_url($m['url']) ?>" class="nav-link <?= is_active($m['url']) ?>">
                                <i class="nav-icon <?= $m['icon'] ?>"></i>
                                <p><?= $m['nama'] ?></p>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>

                <!-- Submenu Grafik -->
                <li class="nav-item <?= (strpos($this->uri->uri_string(), 'dashboard/') !== false && in_array($this->uri->uri_string(), $chart_urls)) ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= (strpos($this->uri->uri_string(), 'dashboard/') !== false && in_array($this->uri->uri_string(), $chart_urls)) ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Grafik / Chart
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php foreach ($chart_menus as $cm): ?>
                        <li class="nav-item">
                            <a href="<?= base_url($cm['url']) ?>" class="nav-link <?= is_active($cm['url']) ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= $cm['nama'] ?></p>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <!-- Logout -->
                <li class="nav-header">LAIN-LAIN</li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/log_out') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
</aside>