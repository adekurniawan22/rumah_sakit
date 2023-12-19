<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Pemeriksaan 2</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <form role="form" action="<?= base_url() ?>dokter/proses_edit_pemeriksaan" method="post">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3 mt-3">
                                <label for="keluhan_umum" class="col-sm-2 col-form-label">Keluhan Umum</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id_pemeriksaan2" value="<?php echo set_value('keluhan_umum', $e_pemeriksaan[0]->id_pemeriksaan2); ?>">
                                    <input type="hidden" name="id_pendaftaran" value="<?php echo set_value('keluhan_umum', $e_pemeriksaan[0]->id_pendaftaran); ?>">
                                    <input type="hidden" name="id_poliklinik" value="<?php echo set_value('keluhan_umum', $e_pemeriksaan[0]->id_poliklinik); ?>">
                                    <input type="text" class="form-control" name="keluhan_umum" value="<?php echo set_value('keluhan_umum', $e_pemeriksaan[0]->keluhan_umum); ?>">
                                    <?= form_error('keluhan_umum', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_penyakit_sekarang" class="col-sm-2 col-form-label">Riwayat Penyakit Sekarang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_penyakit_sekarang" value="<?php echo set_value('riwayat_penyakit_sekarang', $e_pemeriksaan[0]->riwayat_penyakit_sekarang); ?>">
                                    <?= form_error('riwayat_penyakit_sekarang', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_alergi" class="col-sm-2 col-form-label">Riwayat Alergi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_alergi" value="<?php echo set_value('riwayat_alergi', $e_pemeriksaan[0]->riwayat_alergi); ?>">
                                    <?= form_error('riwayat_alergi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_penyakit_dahulu" class="col-sm-2 col-form-label">Riwayat Penyakit Dahulu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_penyakit_dahulu" value="<?php echo set_value('riwayat_penyakit_dahulu', $e_pemeriksaan[0]->riwayat_penyakit_dahulu); ?>">
                                    <?= form_error('riwayat_penyakit_dahulu', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_pengobatan" class="col-sm-2 col-form-label">Riwayat Pengobatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_pengobatan" value="<?php echo set_value('riwayat_pengobatan', $e_pemeriksaan[0]->riwayat_pengobatan); ?>">
                                    <?= form_error('riwayat_pengobatan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_penyakit_keluarga" class="col-sm-2 col-form-label">Riwayat Penyakit Keluarga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_penyakit_keluarga" value="<?php echo set_value('riwayat_penyakit_keluarga', $e_pemeriksaan[0]->riwayat_penyakit_keluarga); ?>">
                                    <?= form_error('riwayat_penyakit_keluarga', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="pemeriksaan" class="col-sm-2 col-form-label">Pemeriksaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pemeriksaan" value="<?php echo set_value('pemeriksaan', $e_pemeriksaan[0]->pemeriksaan); ?>">
                                    <?= form_error('pemeriksaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="diagnosa_utama" class="col-sm-2 col-form-label">Diagnosa Utama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diagnosa_utama" value="<?php echo set_value('diagnosa_utama', $e_pemeriksaan[0]->diagnosa_utama); ?>">
                                    <?= form_error('diagnosa_utama', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="diagnosa_tambahan" class="col-sm-2 col-form-label">Diagnosa Tambahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diagnosa_tambahan" value="<?php echo set_value('diagnosa_tambahan', $e_pemeriksaan[0]->diagnosa_tambahan); ?>">
                                    <?= form_error('diagnosa_tambahan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="planning" class="col-sm-2 col-form-label">Planning</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="planning" value="<?php echo set_value('planning', $e_pemeriksaan[0]->planning); ?>">
                                    <?= form_error('planning', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tindakan" class="col-sm-2 col-form-label">Tindakan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tindakan" value="<?php echo set_value('tindakan', $e_pemeriksaan[0]->tindakan); ?>">
                                    <?= form_error('tindakan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edukasi" class="col-sm-2 col-form-label">Edukasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="edukasi" value="<?php echo set_value('edukasi', $e_pemeriksaan[0]->edukasi); ?>">
                                    <?= form_error('edukasi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="resep_obat" class="col-sm-2 col-form-label">Resep Obat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="resep_obat" style="height: 100px"><?php echo set_value('resep_obat', $e_pemeriksaan[0]->resep_obat); ?></textarea>
                                    <?= form_error('resep_obat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Rencana Pulang / Discharge Planning *</h5>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Apakah ada rencana kontrol?</legend>
                                <div class="col-sm-8">

                                    <?php if ($e_pemeriksaan[0]->rencana_kontrol != '') { ?>
                                        <?php if (strpos($e_pemeriksaan[0]->rencana_kontrol, "Sudah Ditetapkan") !== false) { ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rencana_kontrol_lain" value="<?= $e_pemeriksaan[0]->rencana_kontrol ?>" <?php echo ($e_pemeriksaan[0]->rencana_kontrol == $e_pemeriksaan[0]->rencana_kontrol) ? 'checked' : ''; ?> id="belumDitetapkanRadio">
                                                <label class="form-check-label" for="belumDitetapkanRadio">
                                                    <?= $e_pemeriksaan[0]->rencana_kontrol ?>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rencana_kontrol" value="Sudah Ditetapkan" id="sudahDitetapkanRadio">
                                                <label class="form-check-label" for="sudahDitetapkanRadio">
                                                    Ganti Keterangan Sudah Ditetapkan
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rencana_kontrol" value="Belum Ditetapkan" id="gantiKeteranganRadio">
                                                <label class="form-check-label" for="gantiKeteranganRadio">
                                                    Belum Ditetapkan
                                                </label>
                                            </div>
                                        <?php } ?>

                                        <?php if (strpos($e_pemeriksaan[0]->rencana_kontrol, "Belum Ditetapkan") !== false) { ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rencana_kontrol_lain" value="<?= $e_pemeriksaan[0]->rencana_kontrol ?>" <?php echo ($e_pemeriksaan[0]->rencana_kontrol == $e_pemeriksaan[0]->rencana_kontrol) ? 'checked' : ''; ?> id="belumDitetapkanRadio">
                                                <label class="form-check-label" for="belumDitetapkanRadio">
                                                    <?= $e_pemeriksaan[0]->rencana_kontrol ?>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rencana_kontrol" value="Sudah Ditetapkan" id="sudahDitetapkanRadio">
                                                <label class="form-check-label" for="sudahDitetapkanRadio">
                                                    Sudah Ditetapkan
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rencana_kontrol" value="Belum Ditetapkan" id="gantiKeteranganRadio">
                                                <label class="form-check-label" for="gantiKeteranganRadio">
                                                    Ganti Keterangan Belum Ditetapkan
                                                </label>
                                            </div>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rencana_kontrol" value="Sudah Ditetapkan" id="sudahDitetapkanRadio">
                                            <label class="form-check-label" for="sudahDitetapkanRadio">
                                                Sudah Ditetapkan
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rencana_kontrol" value="Belum Ditetapkan" id="belumDitetapkanRadio">
                                            <label class="form-check-label" for="belumDitetapkanRadio">
                                                Belum Ditetapkan
                                            </label>
                                        </div>
                                    <?php } ?>

                                    <input type="text" class="form-control mt-2 mb-2 " id="rencana_kontrol1" name="rencana_kontrol1" placeholder="Sudah ditetapkan berapa hari.." style="display: none;">
                                    <input type="text" class="form-control mt-2 mb-2 " id="rencana_kontrol2" name="rencana_kontrol2" placeholder="Belum ditetapkan karena.." style="display: none;">

                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Perlu Pelayanan Home Care?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pelayanan_home_care" value="Ya" <?php echo ($e_pemeriksaan[0]->pelayanan_home_care == 'Ya') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pelayanan_home_care" value="Tidak" <?php echo ($e_pemeriksaan[0]->pelayanan_home_care == 'Tidak') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('pelayanan_home_care', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Perlu Kontrol ke Poliklinik?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kontrol_ke_poliklinik" value="Ya" <?php echo ($e_pemeriksaan[0]->kontrol_ke_poliklinik == 'Ya') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kontrol_ke_poliklinik" value="Tidak" <?php echo ($e_pemeriksaan[0]->kontrol_ke_poliklinik == 'Tidak') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('kontrol_ke_poliklinik', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Perlu Penggunaan Alat Medis/Bantu ?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perlu_penggunaan_alat" value="Ya" <?php echo ($e_pemeriksaan[0]->perlu_penggunaan_alat == 'Ya') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perlu_penggunaan_alat" value="Tidak" <?php echo ($e_pemeriksaan[0]->perlu_penggunaan_alat == 'Tidak') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('perlu_penggunaan_alat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Telah dilakukan pemesanan alat?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="telah_memesan_alat" value="Ya" <?php echo ($e_pemeriksaan[0]->telah_memesan_alat == 'Ya') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="telah_memesan_alat" value="Tidak" <?php echo ($e_pemeriksaan[0]->telah_memesan_alat == 'Tidak') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('telah_memesan_alat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Dirujuk ke komunitas tertentu?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dirujuk_ke_komunitas" value="Ya" <?php echo ($e_pemeriksaan[0]->dirujuk_ke_komunitas == 'Ya') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dirujuk_ke_komunitas" value="Tidak" <?php echo ($e_pemeriksaan[0]->dirujuk_ke_komunitas == 'Tidak') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('dirujuk_ke_komunitas', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Dirujuk ke tim terapis?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dirujuk_ke_terapis" value="Ya" <?php echo ($e_pemeriksaan[0]->dirujuk_ke_terapis == 'Ya') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dirujuk_ke_terapis" value="Tidak" <?php echo ($e_pemeriksaan[0]->dirujuk_ke_terapis == 'Tidak') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('dirujuk_ke_terapis', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Dirujuk ke ahli gizi?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dirujuk_ke_ahli_gizi" value="Ya" <?php echo ($e_pemeriksaan[0]->dirujuk_ke_ahli_gizi == 'Ya') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dirujuk_ke_ahli_gizi" value="Tidak" <?php echo ($e_pemeriksaan[0]->dirujuk_ke_ahli_gizi == 'Tidak') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('dirujuk_ke_ahli_gizi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label for="lain_lain" class="col-sm-4 col-form-label">Lain-lain</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="lain_lain" value="<?php echo set_value('lain_lain', $e_pemeriksaan[0]->lain_lain); ?>">
                                    <?= form_error('lain_lain', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Apakah Perlu Melakukan Pemeriksaan Lanjut?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perlu_pemeriksaan_lanjut" value="Ya" <?php echo ($e_pemeriksaan[0]->perlu_pemeriksaan_lanjut == 'Ya') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perlu_pemeriksaan_lanjut" value="Tidak" <?php echo ($e_pemeriksaan[0]->perlu_pemeriksaan_lanjut == 'Tidak') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('perlu_pemeriksaan_lanjut', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-8">
                                    <a class="btn btn-primary" href="<?= base_url() ?>dokter/pemeriksaan">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<?php if ($e_pemeriksaan[0]->rencana_kontrol != '') { ?>
    <script>
        // Mengatur input teks untuk disembunyikan awalnya
        var rencanaKontrol1 = document.getElementById("rencana_kontrol1");
        var rencanaKontrol2 = document.getElementById("rencana_kontrol2");
        rencanaKontrol1.style.display = "none";
        rencanaKontrol2.style.display = "none";
        var radioA = document.getElementById("belumDitetapkanRadio");
        radioA.addEventListener("change", function() {
            if (radioA.checked) {
                sudahDitetapkanRadio.checked = false;
                gantiKeteranganRadio.checked = false;
                rencanaKontrol1.style.display = "none";
                rencanaKontrol2.style.display = "none";
            }
        });

        // Menambahkan event listener untuk radio "Sudah Ditetapkan"
        var sudahDitetapkanRadio = document.getElementById("sudahDitetapkanRadio");
        sudahDitetapkanRadio.addEventListener("change", function() {
            if (sudahDitetapkanRadio.checked) {
                radioA.checked = false;
                gantiKeteranganRadio.checked = false;
                rencanaKontrol1.style.display = "block";
                rencanaKontrol2.style.display = "none";
            }
        });

        // Menambahkan event listener untuk radio "Ganti Keterangan Belum Ditetapkan"
        var gantiKeteranganRadio = document.getElementById("gantiKeteranganRadio");
        gantiKeteranganRadio.addEventListener("change", function() {
            if (gantiKeteranganRadio.checked) {
                radioA.checked = false;
                sudahDitetapkanRadio.checked = false;
                rencanaKontrol1.style.display = "none";
                rencanaKontrol2.style.display = "block";
            }
        });
    </script>
<?php } else { ?>
    <script>
        // Mengatur input teks untuk disembunyikan awalnya
        var rencanaKontrol1 = document.getElementById("rencana_kontrol1");
        var rencanaKontrol2 = document.getElementById("rencana_kontrol2");
        rencanaKontrol1.style.display = "none";
        rencanaKontrol2.style.display = "none";

        // Menambahkan event listener untuk radio "Sudah Ditetapkan"
        var sudahDitetapkanRadio = document.getElementById("sudahDitetapkanRadio");
        sudahDitetapkanRadio.addEventListener("change", function() {
            if (sudahDitetapkanRadio.checked) {
                rencanaKontrol1.style.display = "block";
                rencanaKontrol2.style.display = "none";
            }
        });

        // Menambahkan event listener untuk radio "Belum Ditetapkan"
        var belumDitetapkanRadio = document.getElementById("belumDitetapkanRadio");
        belumDitetapkanRadio.addEventListener("change", function() {
            if (belumDitetapkanRadio.checked) {
                rencanaKontrol1.style.display = "none";
                rencanaKontrol2.style.display = "block";
            }
        });
    </script>
<?php } ?>