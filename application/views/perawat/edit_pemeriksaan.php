<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Pemeriksaan</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <form role="form" action="<?= base_url() ?>perawat/proses_tambah_pemeriksaan" method="post">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pemeriksaan Fisik</h5>
                            <!-- General Form Elements -->
                            <div class="row mb-3">
                                <label for="keadaan_umum" class="col-sm-2 col-form-label">Keadaan Umum</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id_pendaftaran" value="<?= $e_pemeriksaan[0]->id_pemeriksaan1 ?>">
                                    <input type="text" class="form-control" name="keadaan_umum" value="<?php echo set_value('keadaan_umum', $e_pemeriksaan[0]->keadaan_umum); ?>">
                                    <?= form_error('keadaan_umum', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kesadaran" class="col-sm-2 col-form-label">Kesadaran</label>
                                <div class="col-10">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="kesadaran" value="<?php echo set_value('kesadaran', $e_pemeriksaan[0]->kesadaran); ?>">
                                            <?= form_error('kesadaran', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="gcs" class="col-form-label">GCS</label>
                                            <input type="text" class="form-control" name="gcs" value="<?php echo set_value('gcs', $e_pemeriksaan[0]->gcs); ?>">
                                            <?= form_error('gcs', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="e" class="col-form-label">E</label>
                                            <input type="text" class="form-control" name="e" value="<?php echo set_value('e', $e_pemeriksaan[0]->e); ?>">
                                            <?= form_error('e', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="v" class="col-form-label">V</label>
                                            <input type="text" class="form-control" name="v" value="<?php echo set_value('v', $e_pemeriksaan[0]->v); ?>">
                                            <?= form_error('v', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="m" class="col-form-label">M</label>
                                            <input type="text" class="form-control" name="m" value="<?php echo set_value('m', $e_pemeriksaan[0]->m); ?>">
                                            <?= form_error('m', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="keluhan_umum" class="col-sm-2 col-form-label">Keluhan Umum</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="keluhan_umum" value="<?php echo set_value('keluhan_umum', $e_pemeriksaan[0]->keluhan_umum); ?>">
                                    <?= form_error('keluhan_umum', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="keluhan_lain" class="col-sm-2 col-form-label">Keluhan lain yang menyertai</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="keluhan_lain" value="<?php echo set_value('keluhan_lain', $e_pemeriksaan[0]->keluhan_lain); ?>">
                                    <?= form_error('keluhan_lain', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Tanda Vital</h5>
                            <!-- General Form Elements -->
                            <div class="row mb-3">
                                <label for="tekanan_darah" class="col-sm-2 col-form-label">Tekanan Darah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tekanan_darah" value="<?php echo set_value('tekanan_darah', $e_pemeriksaan[0]->tekanan_darah); ?>" placeholder="Masukan dengan satuan mmHg">
                                    <?= form_error('tekanan_darah', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nadi" class="col-sm-2 col-form-label">Nadi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nadi" value="<?php echo set_value('nadi', $e_pemeriksaan[0]->nadi); ?>" placeholder="Masukan dengan jumlah denyut nadi per/menit">
                                    <?= form_error('nadi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="temperatur" class="col-sm-2 col-form-label">Temperatur</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="temperatur" value="<?php echo set_value('temperatur', $e_pemeriksaan[0]->temperatur); ?>" placeholder="Masukan dengan satuan derajat celcius">
                                    <?= form_error('temperatur', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="pernapasan" class="col-sm-2 col-form-label">Pernapasan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pernapasan" value="<?php echo set_value('pernapasan', $e_pemeriksaan[0]->pernapasan); ?>" placeholder="Masukan dengan jumlah hirup dan hembusan napas per/menit">
                                    <?= form_error('pernapasan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Nyeri</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="nyeri" value="Tidak" <?php echo ($e_pemeriksaan[0]->nyeri == 'Tidak') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="nyeri" value="Ya" <?php echo ($e_pemeriksaan[0]->nyeri == 'Ya') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <?= form_error('nyeri', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label for="pencetus" class="col-sm-2 col-form-label">Pencetus</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pencetus" value="<?php echo set_value('pencetus', $e_pemeriksaan[0]->pencetus); ?>">
                                    <?= form_error('pencetus', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kwalitas" class="col-sm-2 col-form-label">Kwalitas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kwalitas" value="<?php echo set_value('kwalitas', $e_pemeriksaan[0]->kwalitas); ?>">
                                    <?= form_error('kwalitas', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="lokasi" value="<?php echo set_value('lokasi', $e_pemeriksaan[0]->lokasi); ?>">
                                    <?= form_error('lokasi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skala" class="col-sm-2 col-form-label">Skala</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="skala" value="<?php echo set_value('skala', $e_pemeriksaan[0]->skala); ?>" placeholder="(NIPS/FLACC/VAS/NRS)">
                                    <?= form_error('skala', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="durasi" class="col-sm-2 col-form-label">Durasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="durasi" value="<?php echo set_value('durasi', $e_pemeriksaan[0]->durasi); ?>">
                                    <?= form_error('durasi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Konsep Diri dan Kognotif</h5>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Pengetahuan tentang penyakit saat ini</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pengetahuan_tentang_penyakit" value="Tidak tau" <?php echo ($e_pemeriksaan[0]->pengetahuan_tentang_penyakit == 'Tidak tau') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Tidak tau
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pengetahuan_tentang_penyakit" value="Tau sedikit" <?php echo ($e_pemeriksaan[0]->pengetahuan_tentang_penyakit == 'Tau sedikit') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Tau sedikit
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pengetahuan_tentang_penyakit" value="Mengerti dan memahami" <?php echo ($e_pemeriksaan[0]->pengetahuan_tentang_penyakit == 'Mengerti dan memahami') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Mengerti dan memahami
                                        </label>
                                    </div>
                                    <?= form_error('pengetahuan_tentang_penyakit', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Perawatan / tindakan yang dilakukan</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perawatan_yg_dilakukan" value="Mengerti" <?php echo ($e_pemeriksaan[0]->perawatan_yg_dilakukan == 'Mengerti') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Mengerti
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perawatan_yg_dilakukan" value="Tidak" <?php echo ($e_pemeriksaan[0]->perawatan_yg_dilakukan == 'Tidak') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('perawatan_yg_dilakukan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Apakah ada perasaaan?</label>
                                <div class="col-sm-10">
                                    <select id="perasaan" class="form-select" aria-label="Default select example" name="perasaan">
                                        <option value="">Pilih Perasaan</option>
                                        <option value="Putus Asa" <?php echo set_select('perasaan', 'Putus Asa', $e_pemeriksaan[0]->perasaan == "Putus Asa"); ?>>Putus Asa</option>
                                        <option value="Penderitaan" <?php echo set_select('perasaan', 'Penderitaan', $e_pemeriksaan[0]->perasaan == "Penderitaan"); ?>>Penderitaan</option>
                                        <option value="Bersalah / pengampunan" <?php echo set_select('perasaan', 'Bersalah / pengampunan', $e_pemeriksaan[0]->perasaan == "Bersalah / pengampunan"); ?>>Bersalah / pengampunan</option>
                                        <option value="Kecewa" <?php echo set_select('perasaan', 'Kecewa', $e_pemeriksaan[0]->perasaan == "Kecewa"); ?>>Kecewa</option>
                                    </select>
                                    <?= form_error('perasaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Status Fungsional</h5>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Aktivitas Sehari-hari</legend>
                                <div class="col-sm-10">
                                    <?php if ($e_pemeriksaan[0]->status_aktivitas != "Mandiri") { ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_aktivitas" value="<?= $e_pemeriksaan[0]->status_aktivitas ?>" <?php echo ($e_pemeriksaan[0]->status_aktivitas == $e_pemeriksaan[0]->status_aktivitas) ? 'checked' : ''; ?>>
                                            <label class="form-check-label">
                                                <?= $e_pemeriksaan[0]->status_aktivitas ?>
                                            </label>
                                        </div>
                                    <?php } ?>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_aktivitas" value="Mandiri" onclick="toggleInputField('Tidak tampil', 'input_teks_status_aktivitas', 'Mandiri', 'Perlu Bantuan')" <?php echo ($e_pemeriksaan[0]->status_aktivitas == 'Mandiri') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Mandiri
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_aktivitas" value="Perlu Bantuan" onclick="toggleInputField('Tampil', 'input_teks_status_aktivitas','Mandiri', 'Perlu Bantuan')">
                                        <label class="form-check-label">
                                            Ganti Keterangan Perlu Bantuan
                                        </label>
                                    </div>
                                    <?= form_error('status_aktivitas', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_status_aktivitas" style="display: none;" placeholder="Masukkan perlu bantuan seperti apa">
                                </div>

                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Muskuloskeleta</legend>
                                <div class="col-sm-10">
                                    <?php if ($e_pemeriksaan[0]->muskuloskeleta != "Tidak ada") { ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="muskuloskeleta" value="<?= $e_pemeriksaan[0]->muskuloskeleta ?>" <?php echo ($e_pemeriksaan[0]->muskuloskeleta == $e_pemeriksaan[0]->muskuloskeleta) ? 'checked' : ''; ?>>
                                            <label class="form-check-label">
                                                <?= $e_pemeriksaan[0]->muskuloskeleta ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="muskuloskeleta" value="Tidak ada" onclick="toggleInputField('Tidak tampil', 'input_teks_muskuloskeleta', 'Tidak ada', 'Ada')" <?php echo ($e_pemeriksaan[0]->muskuloskeleta == 'Tidak ada') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="muskuloskeleta" value="Ada" onclick="toggleInputField('Tampil', 'input_teks_muskuloskeleta','Tidak ada', 'Ada')">
                                        <label class="form-check-label">
                                            Ganti Keterangan Muskuloskeleta
                                        </label>
                                    </div>
                                    <?= form_error('muskuloskeleta', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>

                                    <input type="text" class="form-control mt-3" id="input_teks_muskuloskeleta" style="display: none;" placeholder="Masukkan kelainan seperti apa">
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label for="kekuatan_otot" class="col-sm-2 col-form-label">Kekuatan Otot</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kekuatan_otot" value="<?php echo set_value('kekuatan_otot', $e_pemeriksaan[0]->kekuatan_otot); ?>">
                                    <?= form_error('kekuatan_otot', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Riwayat Alergi</h5>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Apakah ada riwayat alergi?</legend>
                                <div class="col-sm-10">
                                    <?php if ($e_pemeriksaan[0]->alergi != "Tidak ada alergi") { ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="alergi" value="<?= $e_pemeriksaan[0]->alergi ?>" <?php echo ($e_pemeriksaan[0]->alergi == $e_pemeriksaan[0]->alergi) ? 'checked' : ''; ?>>
                                            <label class="form-check-label">
                                                <?= $e_pemeriksaan[0]->alergi ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="alergi" value="Tidak ada alergi" onclick="toggleInputField('Tidak tampil', 'input_teks_alergi', 'Tidak ada alergi', 'Ada alergi')" <?php echo ($e_pemeriksaan[0]->alergi == 'Tidak ada alergi') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="alergi" value="Ada alergi" onclick="toggleInputField('Tampil', 'input_teks_alergi','Tidak ada alergi', 'Ada alergi')">
                                        <label class="form-check-label">
                                            Ganti Keterangan Alergi
                                        </label>
                                    </div>
                                    <?= form_error('alergi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_alergi" style="display: none;" placeholder="Masukkan alergi seperti apa">
                                </div>
                            </fieldset>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Status Psikologis</h5>

                            <div class="row mb-3">
                                <label for="tidur_siang" class="col-sm-2 col-form-label">Tidur Siang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tidur_siang" value="<?php echo set_value('tidur_siang', $e_pemeriksaan[0]->tidur_siang); ?>" placeholder="Masukan dalam jumlah jam per/hari">
                                    <?= form_error('tidur_siang', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tidur_malam" class="col-sm-2 col-form-label">Tidur Malam</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tidur_malam" value="<?php echo set_value('tidur_malam', $e_pemeriksaan[0]->tidur_malam); ?>" placeholder="Masukan dalam jumlah jam per/hari">
                                    <?= form_error('tidur_malam', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Apakah ada gangguan tidur?</legend>
                                <div class="col-sm-10">
                                    <?php if ($e_pemeriksaan[0]->gangguan_tidur != "Tidak ada gangguan tidur") { ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gangguan_tidur" value="<?= $e_pemeriksaan[0]->gangguan_tidur ?>" <?php echo ($e_pemeriksaan[0]->gangguan_tidur == $e_pemeriksaan[0]->gangguan_tidur) ? 'checked' : ''; ?>>
                                            <label class="form-check-label">
                                                <?= $e_pemeriksaan[0]->gangguan_tidur ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gangguan_tidur" value="Tidak ada gangguan tidur" onclick="toggleInputField('Tidak tampil', 'input_teks_gangguan_tidur', 'Tidak ada gangguan tidur', 'Ada gangguan tidur')" <?php echo ($e_pemeriksaan[0]->gangguan_tidur == 'Tidak ada gangguan tidur') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gangguan_tidur" value="Ada gangguan tidur" onclick="toggleInputField('Tampil', 'input_teks_gangguan_tidur','Tidak ada gangguan tidur', 'Ada gangguan tidur')">
                                        <label class="form-check-label">
                                            Ganti Keterangan Gangguan Tidur
                                        </label>
                                    </div>
                                    <?= form_error('gangguan_tidur', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_gangguan_tidur" style="display: none;" placeholder="Masukkan gangguan tidur seperti apa">
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Penerimaan kondisi saat ini</legend>
                                <div class="col-sm-10">
                                    <?php if ($e_pemeriksaan[0]->penerimaan_kondisi != "Menerima Kondisi") { ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penerimaan_kondisi" value="<?= $e_pemeriksaan[0]->penerimaan_kondisi ?>" <?php echo ($e_pemeriksaan[0]->penerimaan_kondisi == $e_pemeriksaan[0]->penerimaan_kondisi) ? 'checked' : ''; ?>>
                                            <label class="form-check-label">
                                                <?= $e_pemeriksaan[0]->penerimaan_kondisi ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="penerimaan_kondisi" value="Menerima Kondisi" onclick="toggleInputField('Tidak tampil', 'input_teks_penerimaan_kondisi', 'Menerima Kondisi', 'Tidak Menerima Kondisi')" <?php echo ($e_pemeriksaan[0]->penerimaan_kondisi == 'Menerima Kondisi') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Menerima
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="penerimaan_kondisi" value="Tidak Menerima Kondisi" onclick="toggleInputField('Tampil', 'input_teks_penerimaan_kondisi','Menerima Kondisi', 'Tidak Menerima Kondisi')">
                                        <label class="form-check-label">
                                            Ganti Keterangan Tidak
                                        </label>
                                    </div>
                                    <?= form_error('penerimaan_kondisi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_penerimaan_kondisi" style="display: none;" placeholder="Masukkan alasan kenapa tidak menerima kondisi saat ini">
                                </div>
                            </fieldset>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Kebutuhan Sosial</h5>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Tinggal Bersama</label>
                                <div class="col-sm-10">
                                    <select id="tinggal_bersama" class="form-select" aria-label="Default select example" name="tinggal_bersama">
                                        <option value="" selected>Pilih Tinggal Bersama</option>
                                        <option value="Suami" <?php echo set_select('tinggal_bersama', 'Suami', $e_pemeriksaan[0]->tinggal_bersama == "Suami"); ?>>Suami</option>
                                        <option value="Istri" <?php echo set_select('tinggal_bersama', 'Istri', $e_pemeriksaan[0]->tinggal_bersama == "Istri"); ?>>Istri</option>
                                        <option value="Keluarga" <?php echo set_select('tinggal_bersama', 'Keluarga', $e_pemeriksaan[0]->tinggal_bersama == "Keluarga"); ?>>Keluarga</option>
                                        <?php if ($e_pemeriksaan[0]->tinggal_bersama != "Suami" && $e_pemeriksaan[0]->tinggal_bersama != "Istri" && $e_pemeriksaan[0]->tinggal_bersama != "Keluarga") { ?>
                                            <option value="<?= $e_pemeriksaan[0]->tinggal_bersama ?>" <?php echo set_select('tinggal_bersama', $e_pemeriksaan[0]->tinggal_bersama, $e_pemeriksaan[0]->tinggal_bersama == $e_pemeriksaan[0]->tinggal_bersama); ?>><?= $e_pemeriksaan[0]->tinggal_bersama ?></option>
                                        <?php }   ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?= form_error('tinggal_bersama', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input id="tinggal_bersama_lainnya" type="text" placeholder="Masukan tinggal bersama lainnya" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kebiasaan" class="col-sm-2 col-form-label">Kebiasaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kebiasaan" value="<?php echo set_value('kebiasaan', $e_pemeriksaan[0]->kebiasaan); ?>">
                                    <?= form_error('kebiasaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Skrining Resiko</h5>

                            <div class="row mb-3">
                                <label for="skor_hm" class="col-sm-2 col-form-label">Skor Humty Dumty (Anak)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="skor_hm" value="<?php echo set_value('skor_hm', $e_pemeriksaan[0]->skor_hm); ?>">
                                    <?= form_error('skor_hm', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <p class="my-2" style="font-size: 12px;"><i>*Skor minimal 7 dan maksimal 23</i></p>
                                    <p class="my-2" style="font-size: 12px;"><i>*Bila skor 7-11 resiko jatuh rendah</i></p>
                                    <p class="my-2" style="font-size: 12px;"><i>*Bila skor diatas 12 resiko jatuh tinggi</i></p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skor_mfs" class="col-sm-2 col-form-label">Skor Morse Fall Scale (Dewasa)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="skor_mfs" value="<?php echo set_value('skor_mfs', $e_pemeriksaan[0]->skor_mfs); ?>">
                                    <?= form_error('skor_mfs', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <p class="my-2" style="font-size: 12px;"><i>*Bila skor diatas 45 resiko tinggi</i></p>
                                    <p class="my-2" style="font-size: 12px;"><i>*Bila skor diantara 25-44 resiko sedang</i></p>
                                    <p class="my-2" style="font-size: 12px;"><i>*Bila skor dibawah 24 resiko rendah</i></p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skor_omss" class="col-sm-2 col-form-label">Skor Ontario modified stratify-Sydney</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="skor_omss" value="<?php echo set_value('skor_omss', $e_pemeriksaan[0]->skor_omss); ?>">
                                    <?= form_error('skor_omss', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <p class="my-2" style="font-size: 12px;"><i>*Bila skor diantara 0-5 resiko rendah</i></p>
                                    <p class="my-2" style="font-size: 12px;"><i>*Bila skor diantara 6-16 resiko sedang</i></p>
                                    <p class="my-2" style="font-size: 12px;"><i>*Bila skor diantara 17-30 resiko tinggi</i></p>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Apakah sudah diberitahukan ke Dokter?</legend>
                                <div class="col-sm-10">
                                    <?php if ($e_pemeriksaan[0]->status_laporan_hasil_SR != "Belum dilaporkan") { ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_laporan_hasil_SR" value="<?= $e_pemeriksaan[0]->status_laporan_hasil_SR ?>" <?php echo ($e_pemeriksaan[0]->status_laporan_hasil_SR == $e_pemeriksaan[0]->status_laporan_hasil_SR) ? 'checked' : ''; ?>>
                                            <label class="form-check-label">
                                                Sudah diberitahukan pada <?= date('d-M-Y', strtotime($e_pemeriksaan[0]->status_laporan_hasil_SR)) ?>, Jam <?= date('H:i', strtotime($e_pemeriksaan[0]->status_laporan_hasil_SR)) ?>
                                            </label>
                                        </div>
                                    <?php } ?>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_laporan_hasil_SR" value="Belum dilaporkan" onclick="toggleInputField('Tidak tampil', 'input_teks_status_laporan_hasil_SR', 'Belum dilaporkan', 'Sudah Dilaporkan')" <?php echo ($e_pemeriksaan[0]->status_laporan_hasil_SR == 'Belum dilaporkan') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Belum
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_laporan_hasil_SR" value="Sudah Dilaporkan" onclick="toggleInputField('Tampil', 'input_teks_status_laporan_hasil_SR','Belum dilaporkan', 'Sudah Dilaporkan')">
                                        <label class="form-check-label">
                                            Ganti waktu pemberitahuan
                                        </label>
                                    </div>
                                    <?= form_error('status_laporan_hasil_SR', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="datetime-local" class="form-control mt-3" id="input_teks_status_laporan_hasil_SR" style="display: none;">
                                </div>
                            </fieldset>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Gizi</h5>

                            <div class="row mb-3">
                                <label for="berat_badan" class="col-sm-2 col-form-label">Berat Badan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="berat_badan" value="<?php echo set_value('berat_badan', $e_pemeriksaan[0]->berat_badan); ?>">
                                    <?= form_error('berat_badan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tinggi_badan" class="col-sm-2 col-form-label">Tinggi Badan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tinggi_badan" value="<?php echo set_value('tinggi_badan', $e_pemeriksaan[0]->tinggi_badan); ?>">
                                    <?= form_error('tinggi_badan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="imt" class="col-sm-2 col-form-label">IMT (Indeks massa tubuh)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="imt" value="<?php echo set_value('imt', $e_pemeriksaan[0]->imt); ?>">
                                    <?= form_error('imt', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skor_mst" class="col-sm-2 col-form-label">Berdasarkan Malnutrition Screening Tool (MST)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="skor_mst" value="<?php echo set_value('skor_mst', $e_pemeriksaan[0]->skor_mst); ?>">
                                    <?= form_error('skor_mst', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <p class="my-2" style="font-size: 12px;"><i>*Bila skor diantara 0-2 = tidak beresiko malnutrisi</i></p>
                                    <p class="my-2" style="font-size: 12px;"><i>*Bila skor diatas 3 = beresiko malnutrisi</i></p>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Riwayat Imunisasi</h5>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Imunisasi Dasar</legend>
                                <div class="col-sm-10">
                                    <?php if ($e_pemeriksaan[0]->imunisasi_dasar != "Lengkap") { ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="imunisasi_dasar" value="<?= $e_pemeriksaan[0]->imunisasi_dasar ?>" <?php echo ($e_pemeriksaan[0]->imunisasi_dasar == $e_pemeriksaan[0]->imunisasi_dasar) ? 'checked' : ''; ?>>
                                            <label class="form-check-label">
                                                <?= $e_pemeriksaan[0]->imunisasi_dasar ?>
                                            </label>
                                        </div>
                                    <?php } ?>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="imunisasi_dasar" value="Lengkap" onclick="toggleInputField('Tidak tampil', 'input_teks_imunisasi_dasar', 'Lengkap', 'Tidak Lengkap')" <?php echo ($e_pemeriksaan[0]->imunisasi_dasar == 'Lengkap') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Lengkap
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="imunisasi_dasar" value="Tidak Lengkap" onclick="toggleInputField('Tampil', 'input_teks_imunisasi_dasar','Lengkap', 'Tidak Lengkap')">
                                        <label class="form-check-label">
                                            Ganti Keterangan Tidak Lengkap
                                        </label>
                                    </div>
                                    <?= form_error('imunisasi_dasar', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_imunisasi_dasar" style="display: none;" placeholder="Masukan alasan mengapa tidak lengkap">
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label for="imunisasi lain" class="col-sm-2 col-form-label">Imunisasi Lain</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="imunisasi lain" value="<?php echo set_value('imunisasi lain', $e_pemeriksaan[0]->imunisasi_lain); ?>">
                                    <?= form_error('imunisasi lain', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Kebutuhan Biologis</h5>

                            <div class="row mb-3">
                                <label for="eliminasi" class="col-sm-2 col-form-label">Eliminasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="eliminasi" value="<?php echo set_value('eliminasi', $e_pemeriksaan[0]->eliminasi); ?>">
                                    <?= form_error('eliminasi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="pola_makan" class="col-sm-2 col-form-label">Pola Makan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pola_makan" value="<?php echo set_value('pola_makan', $e_pemeriksaan[0]->pola_makan); ?>" placeholder="Masukan jumlah berapa kali makan per/hari">
                                    <?= form_error('pola_makan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="pola_minum" class="col-sm-2 col-form-label">Pola Minum</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pola_minum" value="<?php echo set_value('pola_minum', $e_pemeriksaan[0]->pola_minum); ?>" placeholder="Masukan jumlah berapa kali minum per/hari">
                                    <?= form_error('pola_minum', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bak" class="col-sm-2 col-form-label">BAK</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="bak" value="<?php echo set_value('bak', $e_pemeriksaan[0]->bak); ?>" placeholder="Masukan jumlah berapa kali buang air kecil per/hari">
                                    <?= form_error('bak', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bab" class="col-sm-2 col-form-label">BAB</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="bab" value="<?php echo set_value('bab', $e_pemeriksaan[0]->bab); ?>" placeholder="Masukan jumlah berapa kali buang air besar per/hari">
                                    <?= form_error('bab', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Riwayat Tumbuh Kembang Batita</h5>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Umur</legend>
                                <div class="col-sm-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="umur" value="2 Bulan" <?php echo ($e_pemeriksaan[0]->umur == '2 Bulan') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            2 Bulan
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="umur" value="4 Bulan" <?php echo ($e_pemeriksaan[0]->umur == '4 Bulan') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            4 Bulan
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="umur" value="6 Bulan" <?php echo ($e_pemeriksaan[0]->umur == '6 Bulan') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            6 Bulan
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="umur" value="9 Bulan" <?php echo ($e_pemeriksaan[0]->umur == '9 Bulan') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            9 Bulan
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="umur" value="12 Bulan" <?php echo ($e_pemeriksaan[0]->umur == '12 Bulan') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            12 Bulan
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="umur" value="18 Bulan" <?php echo ($e_pemeriksaan[0]->umur == '18 Bulan') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            18 Bulan
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="umur" value="2 Tahun" <?php echo ($e_pemeriksaan[0]->umur == '2 Tahun') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            2 Tahun
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="umur" value="3 Tahun" <?php echo ($e_pemeriksaan[0]->umur == '3 Tahun') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            3 Tahun
                                        </label>
                                    </div>
                                    <?= form_error('umur', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Sosial</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_sosial[]" value="Senyum" type="checkbox" <?php echo set_checkbox('RTKB_sosial[]', 'Senyum'); ?>>
                                        <label class="form-check-label">
                                            Senyum
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_sosial[]" value="Menggapai Mainan" type="checkbox" <?php echo set_checkbox('RTKB_sosial[]', 'Menggapai Mainan'); ?>>
                                        <label class="form-check-label">
                                            Menggapai Mainan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_sosial[]" value="Bermain Cilukba" type="checkbox">
                                        <label class="form-check-label">
                                            Bermain Cilukba
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_sosial[]" value="Minum Dengan Cangkir" type="checkbox">
                                        <label class="form-check-label">
                                            Minum Dengan Cangkir
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_sosial[]" value="Menggunakan Sendok" type="checkbox">
                                        <label class="form-check-label">
                                            Menggunakan Sendok
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_sosial[]" value="Melepaskan Pakaian" type="checkbox">
                                        <label class="form-check-label">
                                            Melepaskan Pakaian
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_sosial[]" value="Bermain Interaktif" type="checkbox">
                                        <label class="form-check-label">
                                            Bermain Interaktif
                                        </label>
                                    </div>
                                    <?= form_error('RTKB_sosial[]', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Motorik Halus</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_halus[]" value="Mengikuti Gerakan" type="checkbox">
                                        <label class="form-check-label">
                                            Mengikuti Gerakan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_halus[]" value="Menggenggam" type="checkbox">
                                        <label class="form-check-label">
                                            Menggenggam
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_halus[]" value="Memindahkan benda dari tangan ke tangan yang lain" type="checkbox">
                                        <label class="form-check-label">
                                            Memindahkan benda dari tangan ke tangan yang lain
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_halus[]" value="Mengambil dengan ibu jqri & telunjuk" type="checkbox">
                                        <label class="form-check-label">
                                            Mengambil dengan ibu jqri & telunjuk
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_halus[]" value="Menjemput benda dengan 5 jari" type="checkbox">
                                        <label class="form-check-label">
                                            Menjemput benda dengan 5 jari
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_halus[]" value="Mencorat-coret kertas" type="checkbox">
                                        <label class="form-check-label">
                                            Mencorat-coret kertas
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_halus[]" value="Membuat Garis" type="checkbox">
                                        <label class="form-check-label">
                                            Membuat Garis
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_halus[]" value="Meniru Membuat Garis" type="checkbox">
                                        <label class="form-check-label">
                                            Meniru Membuat Garis
                                        </label>
                                    </div>
                                    <?= form_error('RTKB_motorik_halus[]', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Motorik Kasar</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_kasar[]" value="Mengangkat Kepala 45 Derajat Dari Perut" type="checkbox">
                                        <label class="form-check-label">
                                            Mengangkat Kepala 45 Derajat Dari Perut
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_kasar[]" value="Membalikan Badan" type="checkbox">
                                        <label class="form-check-label">
                                            Membalikan Badan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_kasar[]" value="Duduk" type="checkbox">
                                        <label class="form-check-label">
                                            Duduk
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_kasar[]" value="Berdiri" type="checkbox">
                                        <label class="form-check-label">
                                            Berdiri
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_kasar[]" value="Berjalan" type="checkbox">
                                        <label class="form-check-label">
                                            Berjalan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_kasar[]" value="Naik Tangga" type="checkbox">
                                        <label class="form-check-label">
                                            Naik Tangga
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_kasar[]" value="Berdiri Dengan Satu Kaki" type="checkbox">
                                        <label class="form-check-label">
                                            Berdiri Dengan Satu Kaki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_motorik_kasar[]" value="Mengayuh Sepeda" type="checkbox">
                                        <label class="form-check-label">
                                            Mengayuh Sepeda
                                        </label>
                                    </div>
                                    <?= form_error('RTKB_motorik_kasar[]', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Bahasa</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_bahasa[]" value="Mengoceh" type="checkbox">
                                        <label class="form-check-label">
                                            Mengoceh
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_bahasa[]" value="Mencari sumber suara" type="checkbox">
                                        <label class="form-check-label">
                                            Mencari sumber suara
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_bahasa[]" value="Mengeluarkan kata ma-ma-da-da" type="checkbox">
                                        <label class="form-check-label">
                                            Mengeluarkan kata ma-ma-da-da
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_bahasa[]" value="Menirukan Suara" type="checkbox">
                                        <label class="form-check-label">
                                            Menirukan Suara
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_bahasa[]" value="Dapat menyebutkan 2 suku kata" type="checkbox">
                                        <label class="form-check-label">
                                            Dapat menyebutkan 2 suku kata
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_bahasa[]" value="Menyebutkan Anggota Tubuh" type="checkbox">
                                        <label class="form-check-label">
                                            Menyebutkan Anggota Tubuh
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="RTKB_bahasa[]" value="Menyebutkan Nama Awal dan Akhir" type="checkbox">
                                        <label class="form-check-label">
                                            Menyebutkan Nama Awal dan Akhir
                                        </label>
                                    </div>
                                    <?= form_error('RTKB_bahasa[]', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Pelaksanaan Asuhan</h5>

                            <div class="row mb-3">
                                <label for="analisa_masalah_keperawatan" class="col-sm-2 col-form-label">Analisa Masalah Keperawatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="analisa_masalah_keperawatan" value="<?php echo set_value('analisa_masalah_keperawatan', $e_pemeriksaan[0]->analisa_masalah_keperawatan); ?>">
                                    <?= form_error('analisa_masalah_keperawatan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
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
                                <label for="implementasi_dan_evaluasi" class="col-sm-2 col-form-label">Implementasi Dan Evaluasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="implementasi_dan_evaluasi" value="<?php echo set_value('implementasi_dan_evaluasi', $e_pemeriksaan[0]->implementasi_dan_evaluasi); ?>">
                                    <?= form_error('implementasi_dan_evaluasi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edukasi" class="col-sm-2 col-form-label">Edukasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="edukasi" value="<?php echo set_value('edukasi', $e_pemeriksaan[0]->edukasi); ?>">
                                    <?= form_error('edukasi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Pemulangan Pasien</h5>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Keadaan Pasien Pulang</label>
                                <div class="col-sm-10">
                                    <select id="keadaan_pasien_pulang" class="form-select" aria-label="Default select example" name="keadaan_pasien_pulang">
                                        <option value="" selected>Pilih Keadaan Pasien</option>
                                        <option value="Sembuh / Pulang" <?php echo set_select('keadaan_pasien_pulang', 'Sembuh / Pulang', $e_pemeriksaan[0]->keadaan_pasien_pulang == "Sembuh / Pulang"); ?>>Sembuh / Pulang</option>
                                        <option value="Dirawat" <?php echo set_select('keadaan_pasien_pulang', 'Dirawat', $e_pemeriksaan[0]->keadaan_pasien_pulang == "Dirawat"); ?>>Dirawat</option>
                                        <option value="Meninggal" <?php echo set_select('keadaan_pasien_pulang', 'Meninggal', $e_pemeriksaan[0]->keadaan_pasien_pulang == "Meninggal"); ?>>Meninggal</option>
                                        <option value="Dirujuk" <?php echo set_select('keadaan_pasien_pulang', 'Dirujuk', $e_pemeriksaan[0]->keadaan_pasien_pulang == "Dirujuk"); ?>>Dirujuk</option>
                                        <?php if ($e_pemeriksaan[0]->keadaan_pasien_pulang != "Dirawat" && $e_pemeriksaan[0]->keadaan_pasien_pulang != "Meninggal" && $e_pemeriksaan[0]->keadaan_pasien_pulang != "Dirujuk" && $e_pemeriksaan[0]->keadaan_pasien_pulang != "Sembuh / Pulang") { ?>
                                            <option value="<?= $e_pemeriksaan[0]->keadaan_pasien_pulang ?>" <?php echo set_select('keadaan_pasien_pulang', $e_pemeriksaan[0]->keadaan_pasien_pulang, $e_pemeriksaan[0]->keadaan_pasien_pulang == $e_pemeriksaan[0]->keadaan_pasien_pulang); ?>><?= $e_pemeriksaan[0]->keadaan_pasien_pulang ?></option>
                                        <?php }   ?>
                                    </select>
                                    <?= form_error('keadaan_pasien_pulang', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="hidden" id="hidden_keadaan_pasien_pulang" name="keadaan_pasien_pulang" value="">

                                    <input id="keadaan_pasien_pulang_dirawat" type="text" placeholder="Masukan ruangan pasien dirawat lainnya" class="form-control mt-3" style="display: none;">
                                    <div id="keadaan_pasien_pulang_meninggal" style="display: none;">
                                        <p class="mt-2"><i style="font-size: 12px;">*Silahkan masukan tanggal pasien meninggal</i></p>
                                        <input type="datetime-local" placeholder="Masukan waktu saat pasein meninggal" class="form-control">
                                    </div>
                                    <input id="keadaan_pasien_pulang_dirujuk" type="text" placeholder="Masukan dirujuk kemana" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Berkas yang diberikan</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" name="berkas_yang_diberikan[]" value="Obat-obatan" type="checkbox">
                                        <label class="form-check-label">
                                            Obat-obatan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="berkas_yang_diberikan[]" value="Foto Rontgen" type="checkbox">
                                        <label class="form-check-label">
                                            Foto Rontgen
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="berkas_yang_diberikan[]" value="EKG" type="checkbox">
                                        <label class="form-check-label">
                                            EKG
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="berkas_yang_diberikan[]" value="Laboratorium" type="checkbox">
                                        <label class="form-check-label">
                                            Laboratorium
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="berkas_yang_diberikan[]" value="USG" type="checkbox">
                                        <label class="form-check-label">
                                            USG
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="berkas_yang_diberikan[]" value="DLL" type="checkbox">
                                        <label class="form-check-label">
                                            DLL
                                        </label>
                                    </div>
                                    <?= form_error('berkas_yang_diberikan[]', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Info dan Edukasi yang diberikan</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" name="info_edukasi_yang_diberikan[]" value="Obat Pulang" type="checkbox">
                                        <label class="form-check-label">
                                            Obat Pulang
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="info_edukasi_yang_diberikan[]" value="Foto Rontgen" type="checkbox">
                                        <label class="form-check-label">
                                            Foto Rontgen
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="info_edukasi_yang_diberikan[]" value="Laboratorium" type="checkbox">
                                        <label class="form-check-label">
                                            Laboratorium
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="info_edukasi_yang_diberikan[]" value="Kontrol Poliklinik" type="checkbox">
                                        <label class="form-check-label">
                                            Kontrol Poliklinik
                                        </label>
                                    </div>
                                    <?= form_error('berkas_yang_diberikan[]', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Pulang atas permintaan sendiri</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_permintaan_pulang" id="gridRadios1" value="Info dan Edukasi" <?php echo ($e_pemeriksaan[0]->status_permintaan_pulang == 'Info dan Edukasi') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Info dan Edukasi
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_permintaan_pulang value=" Tanda Tangan Atas Permintaan Sendiri" <?php echo ($e_pemeriksaan[0]->status_permintaan_pulang == 'Tanda Tangan Atas Permintaan Sendiri') ? 'checked' : ''; ?>>
                                        <label class="form-check-label">
                                            Tanda Tangan Atas Permintaan Sendiri
                                        </label>
                                    </div>
                                    <?= form_error('status_permintaan_pulang', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Melarikan Diri / Minggat</label>
                                <div class="col-sm-10">
                                    <select id="status_melarikan_diri" class="form-select" aria-label="Default select example" name="status_melarikan_diri">
                                        <option value="" selected>Pilih</option>
                                        <option value="Minggat" <?php echo set_select('status_melarikan_diri', 'Minggat', $e_pemeriksaan[0]->status_melarikan_diri == "Minggat"); ?>>Minggat</option>
                                        <option value="Lapor Satpam" <?php echo set_select('status_melarikan_diri', 'Lapor Satpam', $e_pemeriksaan[0]->status_melarikan_diri == "Lapor Satpam"); ?>>Lapor Satpam</option>
                                        <option value="Lapor Supervisor" <?php echo set_select('status_melarikan_diri', 'Lapor Supervisor', $e_pemeriksaan[0]->status_melarikan_diri == "Lapor Supervisor"); ?>>Lapor Supervisor</option>
                                        <?php if ($e_pemeriksaan[0]->status_melarikan_diri != "Minggat" && $e_pemeriksaan[0]->status_melarikan_diri != "Lapor Satpam" && $e_pemeriksaan[0]->status_melarikan_diri != "Lapor Supervisor") { ?>
                                            <option value="<?= $e_pemeriksaan[0]->status_melarikan_diri ?>" <?php echo set_select('status_melarikan_diri', $e_pemeriksaan[0]->status_melarikan_diri, $e_pemeriksaan[0]->status_melarikan_diri == $e_pemeriksaan[0]->status_melarikan_diri); ?>><?= $e_pemeriksaan[0]->status_melarikan_diri ?></option>
                                        <?php }   ?>
                                    </select>
                                    <?= form_error('status_melarikan_diri', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input id="status_melarikan_diri_minggat" type="text" placeholder="Masukan minggat pada pukul berapa" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <a class="btn btn-primary" href="<?= base_url() ?>perawat">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
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

    handleLainnya("tinggal_bersama", "tinggal_bersama_lainnya", "Lainnya");
    handleLainnya("status_melarikan_diri", "status_melarikan_diri_minggat", "Minggat");
</script>
<script>
    function handleLainnya2(selectElementId, inputElementId, lainnya) {
        var selectElement = document.getElementById(selectElementId);
        var inputElement = document.getElementById(inputElementId);
        var hiddenInputElement = document.getElementById("hidden_" + selectElementId);

        selectElement.addEventListener("change", function() {
            if (selectElement.value === lainnya) {
                inputElement.style.display = "block";
            } else {
                inputElement.style.display = "none";
                hiddenInputElement.value = selectElement.value;
            }
        });

        inputElement.addEventListener("input", function() {
            if (selectElement.value === lainnya) {
                var penyambung = "";
                if (selectElement.value === "Dirawat") {
                    penyambung = "di ruangan"
                } else if (selectElement.value === "Meninggal") {
                    penyambung = "pada pukul"
                } else if (selectElement.value === "Dirujuk") {
                    penyambung = "ke"
                }
                // Gabungkan value dropdown dengan teks yang dimasukkan oleh pengguna
                var newValue = selectElement.value + " " + penyambung + " " + inputElement.value;
                hiddenInputElement.value = newValue;
            }
        });
    }

    handleLainnya2("keadaan_pasien_pulang", "keadaan_pasien_pulang_dirawat", "Dirawat");
    handleLainnya2("keadaan_pasien_pulang", "keadaan_pasien_pulang_meninggal", "Meninggal");
    handleLainnya2("keadaan_pasien_pulang", "keadaan_pasien_pulang_dirujuk", "Dirujuk");
</script>
<script>
    function toggleInputField(selectedOption, id_input, value1, value2) {
        var inputTeksOpsi = document.getElementById(id_input);
        var radio1 = document.querySelector('input[value="' + value1 + '"]');
        var radio2 = document.querySelector('input[value="' + value2 + '"]');
        var name = radio1.getAttribute("name");

        if (selectedOption === 'Tampil') {
            inputTeksOpsi.style.display = "block";
            inputTeksOpsi.setAttribute('name', name)
            radio1.checked = false;
            radio2.checked = true;
        } else {
            inputTeksOpsi.style.display = "none";
            inputTeksOpsi.removeAttribute("name");
            radio1.checked = true;
            radio2.checked = false;
        }
    }
</script>