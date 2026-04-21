<nav class="main-header navbar navbar-expand navbar-green navbar-dark">

    <!-- LEFT -->
    <ul class="navbar-nav">
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li> -->

        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url() ?>" class="nav-link" class="font-weight-bold" style="font-size: 18px; color: #fbff00;">
                <b>PUBLIKASI - UIN SAIZU PURWOKERTO</b>
            </a>
        </li>
    </ul>

    <?php  
        // AMBIL LANGSUNG DARI DATABASE TANPA RUBAH NAMA FIELD
        $ci =& get_instance();
        $ci->db->order_by('urut', 'ASC');
        $menus = $ci->db->get_where('menu', ['aktif' => 1])->result_array();
    ?>

    <!-- MENU BAR -->
    <ul class="navbar-nav ml-3">

        <?php foreach ($menus as $m): ?>
        <li class="nav-item">
            <a href="<?= base_url($m['url']) ?>" class="nav-link <?= is_active($m['url']) ?>">
                <i class="mr-1 <?= $m['icon'] ?>"></i> <?= $m['nama'] ?>
            </a>
        </li>
        <?php endforeach; ?>

        <!-- INI UNTUK MENU ADMIN SAJA -->
        <?php if (isset($user_info) && ($user_info['role_id'] == 1 || $user_info['role_id'] == 2)) { ?>
        <!-- NOTIFIKASI -->
        <!-- <ul class="navbar-nav ml-3"> -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i> Master Data
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('master/fakultas') ?>" class="dropdown-item">
                    <i class="fas fa-school mr-2"></i> Fakultas
                    <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('master/prodi') ?>" class="dropdown-item">
                    <i class="fas fa-user-graduate mr-2"></i> Program Studi
                    <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('master/author') ?>" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Author / Tendik
                    <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                </a>
                <a href="<?= base_url('scopus/import') ?>" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Import Scopus
                    <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                </a>
                <a href="<?= base_url('scholar/import') ?>" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Import Scholar
                    <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                </a>
            </div>
        </li>

        <?php }?>
    </ul>

    <!-- RIGHT -->
    <ul class="navbar-nav ml-auto">

        <!-- Search -->
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> -->

        <!-- Fullscreen -->
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li> -->

        <?php if (isset($user_info) && ($user_info['role_id'] == 1 || $user_info['role_id'] == 2)) { ?>
        <!-- Profile -->
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-user-circle"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/log_out') ?>">
                <i class="fas fa-power-off"></i>
            </a>
        </li>
        <?php } ?>

    </ul>

</nav>