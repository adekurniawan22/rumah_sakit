<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Pegawai</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body mt-4">

                        <!-- General Form Elements -->
                        <form role="form" action="<?= base_url() ?>admin/proses_tambah_pegawai" method="post">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nomor Pegawai</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomor_pegawai" value="<?php echo set_value('nomor_pegawai'); ?>">
                                    <?= form_error('nomor_pegawai', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>">
                                    <?= form_error('nama_lengkap', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>">
                                    <?= form_error('username', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="password (default)" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="role" id="roleSelect" value="<?php echo set_value('role'); ?>">
                                        <option value="" selected>Pilih Role</option>
                                        <option value="2" <?php echo set_select('role', '2'); ?>>Petugas Pendaftaran</option>
                                        <option value="3" <?php echo set_select('role', '3'); ?>>Perawat</option>
                                        <option value="4" <?php echo set_select('role', '4'); ?>>Dokter</option>
                                        <option value="5" <?php echo set_select('role', '5'); ?>>Kasir</option>
                                        <option value="6" <?php echo set_select('role', '6'); ?>>Rekam Medis</option>
                                        <option value="7" <?php echo set_select('role', '7'); ?>>Farmasi</option>
                                    </select>
                                    <div class="row mt-3" id="poliklinikSelect" style="display: none;">
                                        <!-- Elemen untuk memilih Poliklinik, awalnya disembunyikan -->
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" name="id_poliklinik" id="id_poliklinik">
                                                <option value="" selected>Pilih Klinik</option>
                                                <?php foreach ($poliklinik as $p) : ?>
                                                    <option value="<?= $p->id_poliklinik ?>" <?php echo set_select('id_poliklinik', $p->id_poliklinik); ?>><?= $p->nama_klinik ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?= form_error('role', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios1" value="Laki-laki" <?php echo set_radio('jenis_kelamin', 'Laki-laki'); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios2" value="Perempuan" <?php echo set_radio('jenis_kelamin', 'Perempuan'); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                    <?= form_error('jenis_kelamin', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomor_hp" value="<?php echo set_value('nomor_hp'); ?>">
                                    <?= form_error('nomor_hp', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" style="height: 100px"><?php echo set_value('alamat'); ?></textarea>
                                    <?= form_error('alamat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <a class="btn btn-primary" href="<?= base_url() ?>admin/pegawai">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>


        </div>
    </section>
</main>

<script>
    // Mendapatkan elemen-elemen yang diperlukan
    const roleSelect = document.getElementById('roleSelect');
    const poliklinikSelect = document.getElementById('poliklinikSelect');
    const poliklinik = document.getElementById('id_poliklinik');

    // Menambahkan event listener untuk perubahan pada elemen "Role"
    roleSelect.addEventListener('change', function() {
        // Mendapatkan nilai yang dipilih
        const selectedRole = roleSelect.value;

        // Menampilkan atau menyembunyikan elemen "Poliklinik" berdasarkan peran yang dipilih
        if (selectedRole === '3' || selectedRole === '4') { // Perawat atau Dokter
            poliklinikSelect.style.display = 'block';
            poliklinik.setAttribute('required', 'required'); // Menambahkan atribut required
        } else {
            poliklinikSelect.style.display = 'none';
            poliklinik.removeAttribute('required'); // Menghapus atribut required
        }
    });
</script>