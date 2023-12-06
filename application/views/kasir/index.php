<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pembayaran</h1>
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
                                        <th>Nama Pasien</th>
                                        <th>Nomor Rekam Medis</th>
                                        <th>Pemeriksaan</th>
                                        <th style="width: 40%;" data-sortable="false">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pembayaran as $data) : ?>
                                        <tr>
                                            <td><?= $data->nama_lengkap_pasien ?></td>
                                            <td><?= $data->nomor_rekam_medis ?></td>
                                            <td><?= $data->nama_poliklinik ?></td>
                                            <td>
                                                <div class="d-inline-block me-1 mb-1">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPasien<?= $data->id_pasien ?>">
                                                        Detail
                                                    </button>
                                                </div>

                                                <div class="d-inline-block me-1 mb-1">
                                                    <form action="<?= base_url() ?>pendaftaran/edit_pasien" method="post">
                                                        <input type="hidden" name="id_pasien" value="<?= $data->id_pasien ?>">
                                                        <button type="submit" class="btn btn-primary">
                                                            Edit <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <?php
                                                if ($data->status_pembayaran == "1") { ?>
                                                    <div class="d-inline-block me-1 mb-1">
                                                        <span class="p-2 btn-success">Lunas <i class="bi bi-check2"></i></span>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="d-inline-block me-1 mb-1">
                                                        <form action="<?= base_url('pendaftaran/tambah_pendaftaran_pasien_lama') ?>" method="post">
                                                            <input type="hidden" name="id_pasien" value="<?= $data->id_pasien ?>">
                                                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $data->id_pasien ?>">
                                                                <i class="bi bi-arrow-right-square-fill"></i> Proses Pembayaran
                                                            </button>
                                                        </form>
                                                    </div>
                                                <?php } ?>
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

<?php foreach ($pasien as $dataModal) : ?>
    <!-- Modal Pasien -->
    <div class="modal fade" id="modalPasien<?= $dataModal->id_pasien ?>" tabindex="-1">
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