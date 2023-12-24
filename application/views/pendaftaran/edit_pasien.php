<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Pasien</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Identitas Pasien</h5>

                        <form role="form" action="<?= base_url() ?>pendaftaran/proses_edit_pasien" method="post">
                            <div class="row mb-3">
                                <label for="nomor_rekam_medis" class="col-sm-2 col-form-label">No. Rekam Medis</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id_pasien" value="<?= $pasien[0]->id_pasien ?>">
                                    <input type="text" class="form-control" name="nomor_rekam_medis" value="<?php echo set_value('nomor_rekam_medis', $pasien[0]->nomor_rekam_medis); ?>">
                                    <?= form_error('nomor_rekam_medis', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_lengkap_pasien" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_lengkap_pasien" value="<?php echo set_value('nama_lengkap_pasien', $pasien[0]->nama_lengkap_pasien); ?>">
                                    <?= form_error('nama_lengkap_pasien', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat dan Tanggal Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="tempat_lahir" value="<?php echo set_value('tempat_lahir', $pasien[0]->tempat_lahir); ?>">
                                    <?= form_error('tempat_lahir', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir', $pasien[0]->tanggal_lahir); ?>">
                                    <?= form_error('tanggal_lahir', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Kartu Identitas</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kartu_identitas" id="gridRadios1" value="KTP" <?php echo ($pasien[0]->kartu_identitas == 'KTP') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            KTP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kartu_identitas" id="gridRadios2" value="SIM" <?php echo ($pasien[0]->kartu_identitas == 'SIM') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            SIM
                                        </label>
                                    </div>
                                    <?= form_error('kartu_identitas', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label for="nomor_kartu_identitas" class="col-sm-2 col-form-label">Nomor Kartu Identitas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomor_kartu_identitas" value="<?php echo set_value('nomor_kartu_identitas', $pasien[0]->nomor_kartu_identitas); ?>">
                                    <?= form_error('nomor_kartu_identitas', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios1" value="Laki-laki" <?php echo ($pasien[0]->jenis_kelamin == 'Laki-laki') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios2" value="Perempuan" <?php echo ($pasien[0]->jenis_kelamin == 'Perempuan') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                    <?= form_error('jenis_kelamin', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pekerjaan" value="<?php echo set_value('pekerjaan', $pasien[0]->pekerjaan); ?>">
                                    <?= form_error('pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="warga_negara" class="col-sm-2 col-form-label">Warga Negara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="warga_negara" value="<?php echo set_value('warga_negara', $pasien[0]->warga_negara); ?>">
                                    <?= form_error('warga_negara', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="suku" class="col-sm-2 col-form-label">Suku</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="suku" value="<?php echo set_value('suku', $pasien[0]->suku); ?>">
                                    <?= form_error('suku', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alamat_lengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat_lengkap" style="height: 100px"><?php echo set_value('alamat_lengkap', $pasien[0]->alamat_lengkap); ?></textarea>
                                    <?= form_error('alamat_lengkap', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Status Perkawinan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="status_perkawinan">
                                        <option value="">Pilih Status Perkawinan</option>
                                        <option value="Menikah" <?php echo set_select('status_perkawinan', 'Menikah', ($pasien[0]->status_perkawinan == "Menikah")); ?>>Menikah</option>
                                        <option value="Belum Menikah" <?php echo set_select('status_perkawinan', 'Belum Menikah', ($pasien[0]->status_perkawinan == "Belum Menikah")); ?>>Belum Menikah</option>
                                        <option value="Janda / Duda" <?php echo set_select('status_perkawinan', 'Janda / Duda', ($pasien[0]->status_perkawinan == "Janda / Duda")); ?>>Janda / Duda</option>
                                    </select>
                                    <?= form_error('status_perkawinan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="agama">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" <?php echo set_select('agama', 'Islam', ($pasien[0]->agama == "Islam")); ?>>Islam</option>
                                        <option value="Khatolik" <?php echo set_select('agama', 'Khatolik', $pasien[0]->agama == "Khatolik"); ?>>Khatolik</option>
                                        <option value="Kristen" <?php echo set_select('agama', 'Kristen', $pasien[0]->agama == "Kristen"); ?>>Kristen</option>
                                        <option value="Hindu" <?php echo set_select('agama', 'Hindu', $pasien[0]->agama == "Hindu"); ?>>Hindu</option>
                                        <option value="Budha" <?php echo set_select('agama', 'Budha', $pasien[0]->agama == "Budha"); ?>>Budha</option>
                                    </select>
                                    <?= form_error('agama', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Bahasa yang digunakan</label>
                                <div class="col-sm-10">
                                    <select id="bahasa_edit" class="form-select" aria-label="Default select example" name="bahasa">
                                        <option value="" selected>Pilih bahasa</option>
                                        <option value="Bahasa Indonesia" <?php echo set_select('bahasa', 'Bahasa Indonesia', $pasien[0]->bahasa == "Bahasa Indonesia"); ?>>Bahasa Indonesia</option>
                                        <?php if ($pasien[0]->bahasa != "Bahasa Indonesia") { ?>
                                            <option value="<?= $pasien[0]->bahasa ?>" <?php echo set_select('bahasa', $pasien[0]->bahasa, $pasien[0]->bahasa == $pasien[0]->bahasa); ?>><?= $pasien[0]->bahasa ?></option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?= form_error('bahasa', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input id="bahasa_lainnya_edit" type="text" placeholder="Masukan bahasa lainnya" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Pendidikan</label>
                                <div class="col-sm-10">
                                    <select id="pendidikan_edit" class="form-select" aria-label="Default select example" name="pendidikan">
                                        <option value="">Pilih Pendidikan</option>
                                        <option value="SD" <?php echo set_select('pendidikan', 'SD', $pasien[0]->pendidikan == 'SD'); ?>>SD</option>
                                        <option value="SMP" <?php echo set_select('pendidikan', 'SMP', $pasien[0]->pendidikan == 'SMP'); ?>>SMP</option>
                                        <option value="SMA" <?php echo set_select('pendidikan', 'SMA', $pasien[0]->pendidikan == 'SMA'); ?>>SMA</option>
                                        <option value="D1/D2/D3" <?php echo set_select('pendidikan', 'D1/D2/D3', $pasien[0]->pendidikan == 'D1/D2/D3'); ?>>D1/D2/D3</option>
                                        <option value="S1" <?php echo set_select('pendidikan', 'S1', $pasien[0]->pendidikan == 'S1'); ?>>S1</option>
                                        <option value="S2" <?php echo set_select('pendidikan', 'S2', $pasien[0]->pendidikan == 'S2'); ?>>S2</option>
                                        <?php if ($pasien[0]->pendidikan != "SD" && $pasien[0]->pendidikan != "SMP" && $pasien[0]->pendidikan != "SMA" && $pasien[0]->pendidikan != "D1/D2/D3" && $pasien[0]->pendidikan != "S1" && $pasien[0]->pendidikan != "S2") { ?>
                                            <option value="<?= $pasien[0]->pendidikan ?>" <?php echo set_select('pendidikan', $pasien[0]->pendidikan, $pasien[0]->pendidikan == $pasien[0]->pendidikan); ?>><?= $pasien[0]->pendidikan ?></option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?= form_error('pendidikan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input id="pendidikan_lainnya_edit" type="text" placeholder="Masukan pendidikan lainnya" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomor_hp" value="<?php echo set_value('nomor_hp', $pasien[0]->nomor_hp); ?>">
                                    <?= form_error('nomor_hp', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <a class="btn btn-primary" href="<?= base_url() ?>pendaftaran/pasien">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Edit</button>
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
    function handleLainnya(selectElementId, inputElementId, lainnya) {
        var selectElement = document.getElementById(selectElementId);
        var inputElement = document.getElementById(inputElementId);
        var originalName = selectElement.getAttribute("name"); // Simpan nama asli

        selectElement.addEventListener("change", function() {
            if (selectElement.value === lainnya) {
                inputElement.style.display = "block";
                inputElement.setAttribute("name", originalName); // Set atribut "name" di input
                selectElement.removeAttribute("name"); // Hapus atribut "name" dari select
            } else {
                inputElement.style.display = "none";
                inputElement.removeAttribute("name"); // Hapus atribut "name" dari input jika bukan "lainnya"
                selectElement.setAttribute("name", originalName); // Set atribut "name" kembali di select
            }
        });
    }

    handleLainnya("bahasa_edit", "bahasa_lainnya_edit", "Lainnya");
    handleLainnya("pendidikan_edit", "pendidikan_lainnya_edit", "Lainnya");
    handleLainnya("jenis_pembayaran_edit", "jenis_pembayaran_lainnya_edit", "Lainnya");
    handleLainnya("hubungan_edit", "hubungan_lainnya_edit", "Lainnya");
</script>