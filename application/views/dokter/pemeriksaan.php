<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pemeriksaan Kedua <?= $user->nama_poliklinik ?></h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">

                        <?= $this->session->flashdata('message');
                        unset($_SESSION['message']); ?>
                        <div class="table-container">
                            <!-- Table with stripped rows -->
                            <table id="example" class="table my-4">
                                <thead>
                                    <tr>
                                        <th>Nomor Rekam Medis</th>
                                        <th>Nama Pasien</th>
                                        <th>Waktu Pemeriksaan</th>
                                        <th class="text-center" data-sortable="false">Informasi Pemeriksaan</th>
                                        <th class="text-center" data-sortable="false">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pemeriksaan1 as $data) : ?>
                                        <tr>
                                            <td><?= $data->nomor_rekam_medis ?></td>
                                            <td><?= $data->nama_lengkap_pasien ?></td>
                                            <td><?= $data->waktu_pemeriksaan ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPasien<?= $data->id_pemeriksaan1 ?>" style="width: 100%;">
                                                    Detail
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <form action="<?= base_url() ?>perawat/edit_pemeriksaan" method="post">
                                                    <input type="hidden" name="id_pemeriksaan1" value="<?= $data->id_pemeriksaan1  ?>">
                                                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                                                        Edit <i class="bi bi-pencil-square"></i>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->

<?php foreach ($pemeriksaan1 as $dataModal) : ?>
    <!-- Modal Pasien -->
    <div class="modal fade" id="modalPasien<?= $dataModal->id_pemeriksaan1 ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi Pemeriksaan Pasien</h5>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Umum</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Nomor Rekam Medis</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->nomor_rekam_medis ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->nama_lengkap_pasien ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Umur</label>
                                    <?php
                                    $tanggal_lahir = $dataModal->tanggal_lahir;
                                    $umur = date_diff(date_create($tanggal_lahir), date_create('today'))->y;
                                    ?>
                                    <input type="text" class="form-control" value="<?= $umur ?> Tahun" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Pemeriksaan Fisik</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Keadaan Umum</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->keadaan_umum ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Kesadaran</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->kesadaran ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">GCS</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->gcs ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">E</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->e ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">V</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->v ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">M</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->m ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Keluhan Umum</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->keluhan_umum ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Keluhan lain yang menyertai</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->keluhan_lain ?>" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Tanda Vital</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Tekanan Darah</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->tekanan_darah ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nadi</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->nadi ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Temperatur</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->temperatur ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Pernapasan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->pernapasan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nyeri</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->nyeri ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Pencetus</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->pencetus ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Kwalitas</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->kwalitas ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->lokasi ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Skala</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->skala ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Durasi</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->durasi ?>" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Konsep Diri dan Kognotif</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Pengetahuan tentang penyakit saat ini</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->pengetahuan_tentang_penyakit ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Perawatan / tindakan yang dilakukan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->perawatan_yg_dilakukan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Perasaan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->perasaan ?>" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Status Fungsional</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Aktivitas Sehari-hari</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->status_aktivitas ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Muskuloskeleta</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->muskuloskeleta ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Kekuatan Otot</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->kekuatan_otot ?>" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Riwayat Alergi</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Alergi</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->alergi ?>" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Status Psikologis</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Tidur Sinag</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->tidur_siang ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Tidur Malam</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->tidur_malam ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Gangguan Tidur</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->gangguan_tidur ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Penerimaan kondisi saat ini</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->penerimaan_kondisi ?>" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Kebutuhan Sosial</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Tinggal Bersama</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->tinggal_bersama ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Kebiasaan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->kebiasaan ?>" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Skrining Resiko</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Skor Humty Dumty (Anak)</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->skor_hm ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Skor Morse Fall Scale (Dewasa)</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->skor_mfs ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Skor Ontario modified stratify-Sydney</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->skor_omss ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Apakah sudah diberitahukan ke Dokter?</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->status_laporan_hasil_SR ?>" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Gizi</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Berat Badan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->berat_badan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Tinggi Badan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->tinggi_badan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">IMT (Indeks Massa Tubuh)</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->imt ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Berdasarkan Malnutrition Screening Tool (MST)</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->skor_mst ?>" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Riwayat Imunisasi</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Imunisasi Dasar</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->imunisasi_dasar ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Imunisasi lain</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->imunisasi_lain ?>" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Kebutuhan Biologis</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Eliminasi</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->eliminasi ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Pola Makan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->pola_makan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Pola Minum</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->pola_minum ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">BAK</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->bak ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">BAB</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->bab ?>" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Riwayat Tumbuh Kembang Batita</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Umur</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->umur ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Sosial</label>
                                    <textarea class="form-control" style="height: 100px" readonly><?= $dataModal->RTKB_sosial ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Motorik Halus</label>
                                    <textarea class="form-control" style="height: 100px" readonly><?= $dataModal->RTKB_motorik_halus ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Motorik Kasar</label>
                                    <textarea class="form-control" style="height: 100px" readonly><?= $dataModal->RTKB_motorik_kasar ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Bahasa</label>
                                    <textarea class="form-control" style="height: 100px" readonly><?= $dataModal->RTKB_bahasa ?></textarea>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Pelaksanaan Asuhan</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Analisa Masalah Keperawatan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->analisa_masalah_keperawatan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Planning</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->planning ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Implementasi Dan Evaluasi</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->implementasi_dan_evaluasi ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Edukasi</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->edukasi ?>" readonly>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Pemulangan Pasien</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Keadaan Pasien Pulang</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->keadaan_pasien_pulang ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Berkas yang diberikan</label>
                                    <textarea class="form-control" style="height: 100px" readonly><?= $dataModal->berkas_yang_diberikan ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Info dan Edukasi yang diberikan</label>
                                    <textarea class="form-control" style="height: 100px" readonly><?= $dataModal->info_edukasi_yang_diberikan ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Pulang atas permintaan sendiri</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->status_permintaan_pulang ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Melarikan Diri / Minggat</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->status_melarikan_diri ?>" readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        centerTextInColumn('#example', 3);
        centerTextInColumn('#example', 4);
        centerTextInColumn('#example', 5);
    });
</script>