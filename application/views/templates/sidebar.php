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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                <?php foreach ($menus as $m): ?>

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