<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Pengambilan Obat</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <form role="form" action="<?= base_url() ?>farmasi/proses_tambah_pengambilan_obat" method="post">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Hasil Pemeriksaan Dari Dokter</h5>
                            <div class="row mb-3 mt-3">
                                <label for="keluhan_umum" class="col-sm-2 col-form-label">Keluhan Umum</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id_pendaftaran" value="<?= $farmasi[0]->id_pendaftaran; ?>">
                                    <input type="hidden" name="id_pasien" value="<?= $farmasi[0]->id_pasien; ?>">
                                    <input type="hidden" name="id_pemeriksaan2" value="<?= $farmasi[0]->id_pemeriksaan2; ?>">
                                    <input type="text" class="form-control" name="keluhan_umum" value="<?php echo set_value('keluhan_umum', $farmasi[0]->keluhan_umum); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_penyakit_sekarang" class="col-sm-2 col-form-label">Riwayat Penyakit Sekarang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_penyakit_sekarang" value="<?php echo set_value('riwayat_penyakit_sekarang', $farmasi[0]->riwayat_penyakit_sekarang); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_alergi" class="col-sm-2 col-form-label">Riwayat Alergi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_alergi" value="<?php echo set_value('riwayat_alergi', $farmasi[0]->riwayat_alergi); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_penyakit_dahulu" class="col-sm-2 col-form-label">Riwayat Penyakit Dahulu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_penyakit_dahulu" value="<?php echo set_value('riwayat_penyakit_dahulu', $farmasi[0]->riwayat_penyakit_dahulu); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_pengobatan" class="col-sm-2 col-form-label">Riwayat Pengobatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_pengobatan" value="<?php echo set_value('riwayat_pengobatan', $farmasi[0]->riwayat_pengobatan); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_penyakit_keluarga" class="col-sm-2 col-form-label">Riwayat Penyakit Keluarga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_penyakit_keluarga" value="<?php echo set_value('riwayat_penyakit_keluarga', $farmasi[0]->riwayat_penyakit_keluarga); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="pemeriksaan" class="col-sm-2 col-form-label">Pemeriksaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pemeriksaan" value="<?php echo set_value('pemeriksaan', $farmasi[0]->pemeriksaan); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="diagnosa_utama" class="col-sm-2 col-form-label">Diagnosa Utama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diagnosa_utama" value="<?php echo set_value('diagnosa_utama', $farmasi[0]->diagnosa_utama); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="diagnosa_tambahan" class="col-sm-2 col-form-label">Diagnosa Tambahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diagnosa_tambahan" value="<?php echo set_value('diagnosa_tambahan', $farmasi[0]->diagnosa_tambahan); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="planning" class="col-sm-2 col-form-label">Planning</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="planning" value="<?php echo set_value('planning', $farmasi[0]->planning); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tindakan" class="col-sm-2 col-form-label">Tindakan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tindakan" value="<?php echo set_value('tindakan', $farmasi[0]->tindakan); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edukasi" class="col-sm-2 col-form-label">Edukasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="edukasi" value="<?php echo set_value('edukasi', $farmasi[0]->edukasi); ?>" readonly>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Data Pengambilan Obat</h5>

                            <table id="farmasi" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll"></th>
                                        <th>Nama Obat</th>
                                        <th>Stok Obat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($obat as $dataObat) : ?>
                                        <tr>
                                            <td><input type="checkbox" class="select-checkbox" name="select_obat[]" value="<?= $dataObat->nama_obat ?>" data-name="<?= $dataObat->nama_obat ?>"></td>
                                            <td><?= $dataObat->nama_obat ?></td>
                                            <td><?= $dataObat->stok_obat ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                            <div class="row mb-3 mt-4">
                                <div class="col-sm-2">Nama Obat</div>
                                <div id="selectedText" class="col-sm-10"><?= form_error('select_obat[]', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?></div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan_pengambilan_obat" class="col-sm-2 col-form-label">Keterangan Pengambilan Obat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="keterangan_pengambilan_obat" style="height: 100px"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <a class="btn btn-primary" href="<?= base_url() ?>farmasi">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>
</main>