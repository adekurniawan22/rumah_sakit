<main id="main" class="main">

    <div class="pagetitle">
        <h1>Ubah password</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-4">
                        <!-- General Form Elements -->
                        <form role="form" action="<?= base_url() ?>admin/proses_ganti_password" method="post">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Paswword sekarang</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password_sekarang">
                                    <?= form_error('password_sekarang', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Paswword baru</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password_baru">
                                    <?= form_error('password_baru', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Konfirmasi paswword baru</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="konfirmasi_password_baru">
                                    <?= form_error('konfirmasi_password_baru', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <a class="btn btn-primary" href="<?= base_url() ?>admin/profil">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Ubah password</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>