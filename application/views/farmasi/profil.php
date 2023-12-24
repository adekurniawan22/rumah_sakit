<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <?= $this->session->flashdata('message');
                        unset($_SESSION['message']); ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- Gambar profil -->
                                <img src="<?= base_url('assets/img/profile/') . $profile[0]->foto ?>" alt="Gambar Profil" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-sm-8">
                                <h1><?= $profile[0]->nama_lengkap ?></h1>
                                <p>Nomor Pegawai : <?= $profile[0]->nomor_pegawai ?> </p>
                                <p>Role : <?= $profile[0]->nama_role ?> </p>
                                <p>Username : <?= $profile[0]->username ?> </p>
                                <p>Jenis Kelamin : <?= $profile[0]->jenis_kelamin ?> </p>
                                <p>Alamat : <?= $profile[0]->alamat ?></p>
                                <p>Nomor HP : <?= $profile[0]->nomor_hp ?> </p>
                                <p>Tanggal akun dibuat : <?= date("d-F-Y", strtotime($profile[0]->tanggal_dibuat));  ?> </p>
                                <a href="<?= base_url() ?>farmasi/edit_profil" class="btn btn-primary">Edit Data <i class="bi bi-pencil-square"></i></a>
                                <a href="<?= base_url() ?>farmasi/ganti_password" class="btn btn-primary">Ubah Password <i class="bi bi-key-fill"></i></a>
                            </div>
                        </div>
                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
        </div>
    </section>

</main>