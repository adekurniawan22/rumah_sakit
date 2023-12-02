<aside id="sidebar" class="sidebar">

    <!-- SIDEBAR ROLE ADMIN -->
    <?php if ($this->session->userdata('id_role') == 1) { ?>
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link <?php echo ($title == "Dashboard Pegawai") ? "active" : "collapsed"; ?>" href="<?php echo base_url() ?>admin"">
                <i class=" bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo ($title == "Manajemen Pegawai") ? "active" : "collapsed"; ?>" href="<?php echo base_url() ?>admin/pegawai">
                    <i class="bi bi-people-fill"></i>
                    <span>Manajemen Pegawai</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo ($title == "Manajemen Poliklinik") ? "active" : "collapsed"; ?>" href="<?php echo base_url() ?>admin/poliklinik">
                    <i class="bi bi-hospital"></i>
                    <span>Manajemen Poliklinik</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo ($title == "Manajemen Biaya") ? "active" : "collapsed"; ?>" href="<?php echo base_url() ?>admin/biaya">
                    <i class="bi bi-cash-coin"></i>
                    <span>Manajemen Biaya</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo ($title == "Manajemen Obat") ? "active" : "collapsed"; ?>" href="<?php echo base_url() ?>admin/obat">
                    <i class="bi bi-cash-coin"></i>
                    <span>Manajemen Obat</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo ($title == "Profil") ? "active" : "collapsed"; ?>" href="<?php echo base_url() ?>admin/profil">
                    <i class="bi bi-people-fill"></i>
                    <span>Profil</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#basicModal" href="">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    <?php } ?>
    <!-- END SIDEBAR ROLE ADMIN -->

    <!-- SIDEBAR ROLE PETUGAS PENDAFTARAN -->
    <?php if ($this->session->userdata('id_role') == 2) { ?>
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link <?php echo ($title == "Pendaftaran") ? "active" : "collapsed"; ?>"" href=" <?php echo base_url() ?>pendaftaran">
                    <i class="bi bi-file-text-fill"></i>
                    <span>Pendaftaran</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link <?php echo ($title == "Profil") ? "active" : "collapsed"; ?>" href="<?php echo base_url() ?>pendaftaran/profil">
                    <i class="bi bi-people-fill"></i>
                    <span>Profil</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#basicModal" href="">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li><!-- End Login Page Nav -->
        </ul>
    <?php } ?>
    <!-- END SIDEBAR ROLE PETUGAS PENDAFTARAN -->

    <!-- SIDEBAR ROLE PERAWAT -->
    <?php if ($this->session->userdata('id_role') == 2) { ?>
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link <?php echo ($title == "Antrian") ? "active" : "collapsed"; ?>"" href=" <?php echo base_url() ?>perawat">
                    <i class="bi bi-ticket-detailed-fill"></i>
                    <span>Antrian</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link <?php echo ($title == "Pemeriksaan Perawat") ? "active" : "collapsed"; ?>"" href=" <?php echo base_url() ?>perawat/pemeriksaan">
                    <i class="bi bi-clipboard2-pulse-fill"></i>
                    <span>Pemeriksaan Perawat</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link <?php echo ($title == "Profil") ? "active" : "collapsed"; ?>" href="<?php echo base_url() ?>perawat/profil">
                    <i class="bi bi-people-fill"></i>
                    <span>Profil</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#basicModal" href="">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li><!-- End Login Page Nav -->
        </ul>
        <!-- END SIDEBAR ROLE PERAWAT -->
    <?php } ?>
</aside>

<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Log out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah kamu yakin untuk log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <a type="button" class="btn btn-primary" href="<?= base_url() ?>auth/logout">Ya, lanjutkan</a>
            </div>
        </div>
    </div>
</div>