<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="<?= base_url('kaji-admin-login/dashboard') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Manage Website</div>
                    <a class="nav-link" href="<?= base_url('kaji-admin-login/profile') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Profile Perusahaan
                    </a>
                    <a class="nav-link" href="<?= base_url('kaji-admin-login/karyawan') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Profile Karyawan
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Layanan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('kaji-admin-login/jenis-product') ?>">Tambah Jenis Product</a>
                            <a class="nav-link" href="<?= base_url('kaji-admin-login/product') ?>">Tambah Product</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= userdata()->row()->name; ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">