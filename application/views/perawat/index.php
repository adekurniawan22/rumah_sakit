<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Antrian <?= $user->nama_klinik ?></h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-xxl-6 col-md-12">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="pt-3">Nomor Antrian Saat Ini</h5>
                        <p class="display-4"><?= $nomor_antri_sekarang->nomor_antri_sekarang ?></p>
                    </div>
                </div>
            </div>

            <div class="col-xxl-6 col-md-12">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="pt-3">Panjang Antrian</h5>
                        <p class="display-4"><?= $panjang_antri ?></p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">

                        <?= $this->session->flashdata('message');
                        unset($_SESSION['message']); ?>
                        <div class="table-container">
                            <!-- Table with stripped rows -->
                            <table class="table table-striped my-4">
                                <thead>
                                    <tr>
                                        <th>Nomor Rekam Medis</th>
                                        <th>Nama Pasien</th>
                                        <th>Nomor Antri</th>
                                        <th data-sortable="false">Infromasi Pasien</th>
                                        <th data-sortable="false">Lakukan Pemeriksaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($antrian as $data) : ?>
                                        <tr>
                                            <td><?= $data->nomor_rekam_medis ?></td>
                                            <td><?= $data->nama_lengkap_pasien ?></td>
                                            <td><?= $data->nomor_antri ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPasien<?= $data->id_pendaftaran ?>" style="width: 100%;">
                                                    Detail
                                                </button>
                                            </td>
                                            <td>
                                                <form action="<?= base_url() ?>perawat/tambah_pemeriksaan" method="post">
                                                    <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran  ?>">
                                                    <input type="hidden" name="nomor_antri" value="<?= $data->nomor_antri  ?>">
                                                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                                                        <i class="bi bi-forward-fill"></i>
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

<?php foreach ($antrian as $dataModal) : ?>
    <!-- Modal Pasien -->
    <div class="modal fade" id="modalPasien<?= $dataModal->id_pendaftaran ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi Pasien</h5>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <!-- Vertical Form -->
                            <form class="row g-3 mt-2">
                                <div class="col-12">
                                    <label class="form-label">Nomor Rekam Medis</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->nomor_rekam_medis ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->nama_lengkap_pasien ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Tempat dan Tanggal Lahir</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->tempat_lahir . ', ' . date('d-m-Y', strtotime($dataModal->tanggal_lahir)) ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Kartu Identitas</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->kartu_identitas ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nomor Kartu Identitas</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->nomor_kartu_identitas ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->jenis_kelamin ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->pekerjaan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Warga Negara</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->warga_negara ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Suku</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->suku ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Alamat Lengkap</label>
                                    <textarea class="form-control" style="height: 100px" readonly><?= $dataModal->alamat_lengkap ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Status Perkawinan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->status_perkawinan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Agama</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->agama ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Bahasa yang digunakan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->bahasa ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Pendidikan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->pendidikan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nomor HP</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->nomor_hp ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Jenis Pembayaran</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->jenis_pembayaran ?>" readonly>
                                </div>
                            </form><!-- Vertical Form -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Panggil fungsi centerTextInColumn untuk mengubah teks menjadi tengah dalam kolom "Age"
        centerTextInColumn('#example', 4); // 1 adalah indeks kolom "Age"
        centerTextInColumn('#example', 5); // 1 adalah indeks kolom "Age"
        centerTextInColumn('#example', 6); // 1 adalah indeks kolom "Age"
        centerTextInColumn('#example', 7); // 1 adalah indeks kolom "Age"
        centerTextInColumn('#example', 8); // 1 adalah indeks kolom "Age"
        centerTextInColumn('#example', 9); // 1 adalah indeks kolom "Age"
    });
</script>