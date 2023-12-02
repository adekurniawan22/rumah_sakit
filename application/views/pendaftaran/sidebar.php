<aside id="sidebar" class="sidebar">

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

</aside><!-- End Sidebar-->

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
</div><!-- End Basic Modal-->