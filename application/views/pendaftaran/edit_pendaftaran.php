<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Pendaftaran</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Identitas Pasien</h5>
                        <!-- General Form Elements -->
                        <form role="form" action="<?= base_url() ?>pendaftaran/proses_edit_pendaftaran" method="post">
                            <div class="row mb-3">
                                <label for="nomor_rekam_medis" class="col-sm-2 col-form-label">No. Rekam Medis</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id_pendaftaran" value="<?= $pendaftaran[0]->id_pendaftaran ?>">
                                    <input type="hidden" name="id_pasien" value="<?= $pendaftaran[0]->id_pasien ?>">
                                    <input type="text" class="form-control" name="nomor_rekam_medis" value="<?php echo set_value('nomor_rekam_medis', $pendaftaran[0]->nomor_rekam_medis); ?>">
                                    <?= form_error('nomor_rekam_medis', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_lengkap_pasien" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_lengkap_pasien" value="<?php echo set_value('nama_lengkap_pasien', $pendaftaran[0]->nama_lengkap_pasien); ?>">
                                    <?= form_error('nama_lengkap_pasien', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat dan Tanggal Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="tempat_lahir" value="<?php echo set_value('tempat_lahir', $pendaftaran[0]->tempat_lahir); ?>">
                                    <?= form_error('tempat_lahir', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir', $pendaftaran[0]->tanggal_lahir); ?>">
                                    <?= form_error('tanggal_lahir', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Kartu Identitas</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kartu_identitas" id="gridRadios1" value="KTP" <?php echo ($pendaftaran[0]->kartu_identitas == 'KTP') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            KTP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kartu_identitas" id="gridRadios2" value="SIM" <?php echo ($pendaftaran[0]->kartu_identitas == 'SIM') ? 'checked' : ''; ?>>
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
                                    <input type="text" class="form-control" name="nomor_kartu_identitas" value="<?php echo set_value('nomor_kartu_identitas', $pendaftaran[0]->nomor_kartu_identitas); ?>">
                                    <?= form_error('nomor_kartu_identitas', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios1" value="Laki-laki" <?php echo ($pendaftaran[0]->jenis_kelamin == 'Laki-laki') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios2" value="Perempuan" <?php echo ($pendaftaran[0]->jenis_kelamin == 'Perempuan') ? 'checked' : ''; ?>>
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
                                    <input type="text" class="form-control" name="pekerjaan" value="<?php echo set_value('pekerjaan', $pendaftaran[0]->pekerjaan); ?>">
                                    <?= form_error('pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="warga_negara" class="col-sm-2 col-form-label">Warga Negara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="warga_negara" value="<?php echo set_value('warga_negara', $pendaftaran[0]->warga_negara); ?>">
                                    <?= form_error('warga_negara', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="suku" class="col-sm-2 col-form-label">Suku</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="suku" value="<?php echo set_value('suku', $pendaftaran[0]->suku); ?>">
                                    <?= form_error('suku', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alamat_lengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat_lengkap" style="height: 100px"><?php echo set_value('alamat_lengkap', $pendaftaran[0]->alamat_lengkap); ?></textarea>
                                    <?= form_error('alamat_lengkap', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Status Perkawinan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="status_perkawinan">
                                        <option value="">Pilih Status Perkawinan</option>
                                        <option value="Menikah" <?php echo set_select('status_perkawinan', 'Menikah', ($pendaftaran[0]->status_perkawinan == "Menikah")); ?>>Menikah</option>
                                        <option value="Belum Menikah" <?php echo set_select('status_perkawinan', 'Belum Menikah', ($pendaftaran[0]->status_perkawinan == "Belum Menikah")); ?>>Belum Menikah</option>
                                        <option value="Janda / Duda" <?php echo set_select('status_perkawinan', 'Janda / Duda', ($pendaftaran[0]->status_perkawinan == "Janda / Duda")); ?>>Janda / Duda</option>
                                    </select>
                                    <?= form_error('status_perkawinan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="agama">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" <?php echo set_select('agama', 'Islam', ($pendaftaran[0]->agama == "Islam")); ?>>Islam</option>
                                        <option value="Khatolik" <?php echo set_select('agama', 'Khatolik', $pendaftaran[0]->agama == "Khatolik"); ?>>Khatolik</option>
                                        <option value="Kristen" <?php echo set_select('agama', 'Kristen', $pendaftaran[0]->agama == "Kristen"); ?>>Kristen</option>
                                        <option value="Hindu" <?php echo set_select('agama', 'Hindu', $pendaftaran[0]->agama == "Hindu"); ?>>Hindu</option>
                                        <option value="Budha" <?php echo set_select('agama', 'Budha', $pendaftaran[0]->agama == "Budha"); ?>>Budha</option>
                                    </select>
                                    <?= form_error('agama', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Bahasa yang digunakan</label>
                                <div class="col-sm-10">
                                    <select id="bahasa_edit" class="form-select" aria-label="Default select example" name="bahasa">
                                        <option value="" selected>Pilih bahasa</option>
                                        <option value="Bahasa Indonesia" <?php echo set_select('bahasa', 'Bahasa Indonesia', $pendaftaran[0]->bahasa == "Bahasa Indonesia"); ?>>Bahasa Indonesia</option>
                                        <?php if ($pendaftaran[0]->bahasa != "Bahasa Indonesia") { ?>
                                            <option value="<?= $pendaftaran[0]->bahasa ?>" <?php echo set_select('bahasa', $pendaftaran[0]->bahasa, $pendaftaran[0]->bahasa == $pendaftaran[0]->bahasa); ?>><?= $pendaftaran[0]->bahasa ?></option>
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
                                        <option value="SD" <?php echo set_select('pendidikan', 'SD', $pendaftaran[0]->pendidikan == 'SD'); ?>>SD</option>
                                        <option value="SMP" <?php echo set_select('pendidikan', 'SMP', $pendaftaran[0]->pendidikan == 'SMP'); ?>>SMP</option>
                                        <option value="SMA" <?php echo set_select('pendidikan', 'SMA', $pendaftaran[0]->pendidikan == 'SMA'); ?>>SMA</option>
                                        <option value="D1/D2/D3" <?php echo set_select('pendidikan', 'D1/D2/D3', $pendaftaran[0]->pendidikan == 'D1/D2/D3'); ?>>D1/D2/D3</option>
                                        <option value="S1" <?php echo set_select('pendidikan', 'S1', $pendaftaran[0]->pendidikan == 'S1'); ?>>S1</option>
                                        <option value="S2" <?php echo set_select('pendidikan', 'S2', $pendaftaran[0]->pendidikan == 'S2'); ?>>S2</option>
                                        <?php if ($pendaftaran[0]->pendidikan != "SD" && $pendaftaran[0]->pendidikan != "SMP" && $pendaftaran[0]->pendidikan != "SMA" && $pendaftaran[0]->pendidikan != "D1/D2/D3" && $pendaftaran[0]->pendidikan != "S1" && $pendaftaran[0]->pendidikan != "S2") { ?>
                                            <option value="<?= $pendaftaran[0]->pendidikan ?>" <?php echo set_select('pendidikan', $pendaftaran[0]->pendidikan, $pendaftaran[0]->pendidikan == $pendaftaran[0]->pendidikan); ?>><?= $pendaftaran[0]->pendidikan ?></option>
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
                                    <input type="text" class="form-control" name="nomor_hp" value="<?php echo set_value('nomor_hp', $pendaftaran[0]->nomor_hp); ?>">
                                    <?= form_error('nomor_hp', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jenis Pembayaran</label>
                                <div class="col-sm-10">
                                    <select id="jenis_pembayaran_edit" class="form-select" aria-label="Default select example" name="jenis_pembayaran">
                                        <option value="" selected>Pilih Jenis Pembayaran</option>
                                        <option value="Bayar" <?php echo set_select('jenis_pembayaran', 'Bayar', $pendaftaran[0]->jenis_pembayaran == 'Bayar'); ?>>Bayar</option>
                                        <option value="BPJS" <?php echo set_select('jenis_pembayaran', 'BPJS', $pendaftaran[0]->jenis_pembayaran == 'BPJS'); ?>>BPJS</option>
                                        <option value="JAMKESDA" <?php echo set_select('jenis_pembayaran', 'JAMKESDA', $pendaftaran[0]->jenis_pembayaran == 'JAMKESDA'); ?>>JAMKESDA</option>
                                        <?php if ($pendaftaran[0]->jenis_pembayaran != "Bayar" && $pendaftaran[0]->jenis_pembayaran != "BPJS" && $pendaftaran[0]->jenis_pembayaran != "JAMKESDA") { ?>
                                            <option value="<?= $pendaftaran[0]->jenis_pembayaran ?>" <?php echo set_select('jenis_pembayaran', $pendaftaran[0]->jenis_pembayaran, $pendaftaran[0]->jenis_pembayaran == $pendaftaran[0]->jenis_pembayaran); ?>><?= $pendaftaran[0]->jenis_pembayaran ?></option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?= form_error('jenis_pembayaran', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input id="jenis_pembayaran_lainnya_edit" type="text" placeholder="Masukan jenis pembayaran lainnya" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Identitas Penanggung Jawab</h5>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Penanggung Jawab</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="penanggung_jawab">
                                        <option value="">Pilih Penanggung Jawab</option>
                                        <option value="Pribadi" <?php echo set_select('penanggung_jawab', 'Pribadi', $pendaftaran[0]->penanggung_jawab == "Pribadi"); ?>>Pribadi</option>
                                        <option value="Keluarga" <?php echo set_select('penanggung_jawab', 'Keluarga', $pendaftaran[0]->penanggung_jawab == "Keluarga"); ?>>Keluarga</option>
                                        <option value="Perusahaan" <?php echo set_select('penanggung_jawab', 'Perusahaan', $pendaftaran[0]->penanggung_jawab == "Perusahaan"); ?>>Perusahaan</option>
                                        <option value="Asuransi" <?php echo set_select('penanggung_jawab', 'Asuransi', $pendaftaran[0]->penanggung_jawab == "Asuransi"); ?>>Asuransi</option>
                                    </select>
                                    <?= form_error('penanggung_jawab', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_penanggung_jawab" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_penanggung_jawab" value="<?php echo set_value('nama_penanggung_jawab', $pendaftaran[0]->nama_penanggung_jawab); ?>">
                                    <?= form_error('nama_penanggung_jawab', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Hubungan</label>
                                <div class="col-sm-10">
                                    <select id="hubungan_edit" class="form-select" aria-label="Default select example" name="hubungan">
                                        <option value="" selected>Pilih Hubungan</option>
                                        <option value="Orang Tua" <?php echo set_select('hubungan', 'Orang Tua', $pendaftaran[0]->hubungan == "Orang Tua"); ?>>Orang Tua</option>
                                        <option value="Suami" <?php echo set_select('hubungan', 'Suami', $pendaftaran[0]->hubungan == "Suami"); ?>>Suami</option>
                                        <option value="Istri" <?php echo set_select('hubungan', 'Istri', $pendaftaran[0]->hubungan == "Istri"); ?>>Istri</option>
                                        <option value="Anak" <?php echo set_select('hubungan', 'Anak', $pendaftaran[0]->hubungan == "Anak"); ?>>Anak</option>
                                        <option value="Kerabat" <?php echo set_select('hubungan', 'Kerabat', $pendaftaran[0]->hubungan == "Kerabat"); ?>>Kerabat</option>
                                        <?php if ($pendaftaran[0]->hubungan != "Orang Tua" && $pendaftaran[0]->hubungan != "Suami" && $pendaftaran[0]->hubungan != "Istri" && $pendaftaran[0]->hubungan != "Anak" && $pendaftaran[0]->hubungan != "Kerabat") { ?>
                                            <option value="<?= $pendaftaran[0]->hubungan ?>" <?php echo set_select('hubungan', $pendaftaran[0]->hubungan, $pendaftaran[0]->hubungan == $pendaftaran[0]->hubungan); ?>><?= $pendaftaran[0]->hubungan ?></option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?= form_error('hubungan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input id="hubungan_lainnya_edit" type="text" placeholder="Masukan hubungan lainnya" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alamat_penanggung_jawab" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat_penanggung_jawab" style="height: 100px"><?php echo set_value('alamat_penanggung_jawab', $pendaftaran[0]->alamat_penanggung_jawab); ?></textarea>
                                    <?= form_error('alamat_penanggung_jawab', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nomor_hp_penanggung_jawab" class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomor_hp_penanggung_jawab" value="<?php echo set_value('nomor_hp_penanggung_jawab', $pendaftaran[0]->nomor_hp_penanggung_jawab); ?>">
                                    <?= form_error('nomor_hp_penanggung_jawab', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Poliklinik</label>
                                <div class="col-sm-10">
                                    <select id="poliklinik" class="form-select" aria-label="Default select example" name="id_poliklinik">
                                        <option value="" selected>Pilih Poliklinik</option>
                                        <?php foreach ($poliklinik as $p) : ?>
                                            <option value="<?= $p->id_poliklinik ?>" <?php echo set_select('id_poliklinik', $p->id_poliklinik, $p->id_poliklinik == $pendaftaran[0]->id_poliklinik); ?>><?= $p->nama_poliklinik ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('id_poliklinik', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Tata tertib, Hak dan Kewajiban Pasien Diserahkan Kepada Pasien / Keluarga</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ketentuan_rs_ke_pasien" id="gridRadios1" value="Sudah" <?php echo ($pendaftaran[0]->ketentuan_rs_ke_pasien == 'Sudah') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Sudah
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ketentuan_rs_ke_pasien" id="gridRadios2" value="Belum" <?php echo ($pendaftaran[0]->ketentuan_rs_ke_pasien == 'Belum') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Belum
                                        </label>
                                    </div>
                                    <?= form_error('ketentuan_rs_ke_pasien', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <a class="btn btn-primary" href="<?= base_url() ?>pendaftaran">Kembali</a>
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