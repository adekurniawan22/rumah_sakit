<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pemeriksaan Kedua <?= $pegawai->nama_poliklinik ?></h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">

                        <?= $this->session->flashdata('message');
                        unset($_SESSION['message']); ?>
                        <div class="table-container">

                            <table id="example" class="table my-4">
                                <thead>
                                    <tr>
                                        <th>Nomor Rekam Medis</th>
                                        <th>Nama Pasien</th>
                                        <th>Waktu Pemeriksaan</th>
                                        <th class="text-center" data-sortable="false">Informasi Pemeriksaan</th>
                                        <th class="text-center" data-sortable="false">Aksi</th>
                                        <th class="text-center" data-sortable="false">Cetak Resep Obat</th>
                                        <th class="text-center" data-sortable="false">Cetak Surat Pemeriksaan Lanjut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pemeriksaan2 as $data) : ?>
                                        <tr>
                                            <td><?= $data->nomor_rekam_medis ?></td>
                                            <td><?= $data->nama_lengkap_pasien ?></td>
                                            <td><?= $data->waktu_pemeriksaan2 ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPemeriksaan2<?= $data->id_pemeriksaan2 ?>" style="width: 100%;">
                                                    Detail
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <form action="<?= base_url() ?>dokter/edit_pemeriksaan" method="post">
                                                    <input type="hidden" name="id_pemeriksaan2" value="<?= $data->id_pemeriksaan2  ?>">
                                                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                                                        Edit <i class="bi bi-pencil-square"></i>
                                                </form>
                                            </td>
                                            <td class="text-center">
                                                <div class="class=" d-inline-block me-1 mb-1"">
                                                    <form action="<?= base_url('dokter/cetak_resep_obat') ?>" target="_blank" method="post">
                                                        <input type="hidden" name="id_pemeriksaan2" value="<?= $data->id_pemeriksaan2 ?>">
                                                        <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                                                        <input type="hidden" name="nama_poliklinik" value="<?= $data->nama_poliklinik ?>">
                                                        <input type="hidden" name="nama_lengkap_pasien" value="<?= $data->nama_lengkap_pasien ?>">
                                                        <button type="submit" class="btn btn-primary ">
                                                            <i class="bi bi-printer-fill"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="class=" d-inline-block me-1 mb-1"">
                                                    <?php if ($data->status_pemeriksaan_lanjut == '1') { ?>
                                                        <form action="<?= base_url('dokter/cetak_surat_pemeriksaan_lanjut') ?>" target="_blank" method="post">
                                                            <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                                                            <input type="hidden" name="nama_poliklinik" value="<?= $data->nama_poliklinik ?>">
                                                            <input type="hidden" name="nama_lengkap_pasien" value="<?= $data->nama_lengkap_pasien ?>">
                                                            <button type="submit" class="btn btn-primary ">
                                                                <i class="bi bi-printer-fill"></i>
                                                            </button>
                                                        </form>
                                                    <?php } else { ?>
                                                        <span class="p-2 ">Tidak ada</span>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

<?php foreach ($pemeriksaan2 as $dataModal) : ?>
    <!-- Modal Pasien -->
    <div class="modal fade" id="modalPemeriksaan2<?= $dataModal->id_pemeriksaan2 ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi Pemeriksaan 2 Pasien</h5>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label mt-3">Keluhan Umum</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->keluhan_umum ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Riwayat Penyakit Sekarang</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->riwayat_penyakit_sekarang ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Riwayat Alergi</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->riwayat_alergi ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Riwayat Penyakit Dahulu</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->riwayat_penyakit_dahulu ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Riwayat Pengobatan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->riwayat_pengobatan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Riwayat Penyakit Keluarga</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->riwayat_penyakit_keluarga ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Pemeriksaan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->pemeriksaan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Diagnosa Utama</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->diagnosa_utama ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Diagnosa Tambahan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->diagnosa_tambahan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Planning</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->planning ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Tindakan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->tindakan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Edukasi</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->edukasi ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Resep Obat</label>
                                    <textarea class="form-control" style="height: 100px" readonly><?= $dataModal->resep_obat ?></textarea>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <hr class="border border-primary border-3 opacity-50 ">
                            <h5 class="card-title">Rencana Pulang / Discharge Planning</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Rencana Kontrol</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->rencana_kontrol ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Pelayanan Home Care</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->pelayanan_home_care ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Kontrol Ke Poliklinik</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->kontrol_ke_poliklinik ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Penggunaan Alat Medis/Bantu</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->perlu_penggunaan_alat ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Dilakukan Pemesanan Alat</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->telah_memesan_alat ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Dirujuk Ke Komunitas Tertentu</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->dirujuk_ke_komunitas ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Dirujuk Ke Tim Terapis</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->dirujuk_ke_terapis ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Dirujuk Ke Ahli Gizi</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->dirujuk_ke_ahli_gizi ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Lain-lain</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->lain_lain ?>" readonly>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Perlu Melakukan Pemeriksaan Lanjut</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->perlu_pemeriksaan_lanjut ?>" readonly>
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