<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pendaftaran</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="pb-3">
                            <a href="<?= base_url() ?>pendaftaran/tambah_pendaftaran" class="btn btn-primary">+ Tambah Pendaftaran</a>
                        </div>
                        <?= $this->session->flashdata('message');
                        unset($_SESSION['message']); ?>
                        <div class="table-table-container mt-3">

                            <table id="pendaftaran" class="table my-4">
                                <thead>
                                    <tr>
                                        <th>ID Pendaftaran</th>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal Pendaftaran</th>
                                        <th>Poliklinik</th>
                                        <th style="width: 30%;" class="text-center" data-sortable="false">Informasi Detail</th>
                                        <th style="width: 10%;" class="text-center" data-sortable="false">Aksi</th>
                                        <th style="width: 5%;" class="text-center" data-sortable="false">Cetak Nota</th>
                                        <th style="width: 5%;" class="text-center" data-sortable="false">Cetak Antri</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pendaftaran as $data) : ?>
                                        <tr>
                                            <td><?= $data->id_pendaftaran ?></td>
                                            <td><?= $data->nama_lengkap_pasien ?></td>
                                            <td><?= date('d-F-Y', strtotime($data->waktu_pendaftaran)) ?>, Jam <?= date('H:i', strtotime($data->waktu_pendaftaran)) ?></td>
                                            <td><?= $data->nama_poliklinik ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary d-inline-block me-1 mb-1" data-bs-toggle="modal" data-bs-target="#modalPasien<?= $data->id_pendaftaran ?>">
                                                    Pasien <i class="bi bi-eye-fill"></i>
                                                </button>

                                                <button type="button" class="btn btn-primary d-inline-block me-1 mb-1" data-bs-toggle="modal" data-bs-target="#modalPJ<?= $data->id_pendaftaran ?>">
                                                    Penanggung Jawab <i class="bi bi-eye-fill"></i>
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-block me-1 mb-1">
                                                    <form action="<?= base_url() ?>pendaftaran/edit_pendaftaran" method="post">
                                                        <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                                <div class="d-inline-block me-1 mb-1">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $data->id_pendaftaran ?>">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <div class="class=" d-inline-block me-1 mb-1"">
                                                    <?php if ($data->status_pembayaran == "1") { ?>
                                                        <span>Lunas</span>
                                                    <?php } else { ?>
                                                        <form action="<?= base_url('pendaftaran/cetak_nota') ?>" target="_blank" method="post" class="">
                                                            <input type="hidden" name="nomor_rekam_medis" value="<?= $data->nomor_rekam_medis ?>">
                                                            <input type="hidden" name="nama_lengkap_pasien" value="<?= $data->nama_lengkap_pasien ?>">
                                                            <input type="hidden" name="nama_poliklinik" value="<?= $data->nama_poliklinik ?>">
                                                            <button type="submit" class="btn btn-primary ">
                                                                <i class="bi bi-printer-fill"></i>
                                                            </button>
                                                        </form>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="class=" d-inline-block me-1 mb-1"">
                                                    <?php if ($data->nomor_antri) { ?>
                                                        <form action="<?= base_url('qr/buat_qr_code') ?>" target="_blank" method="post">
                                                            <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                                                            <input type="hidden" name="id_poliklinik" value="<?= $data->id_poliklinik ?>">
                                                            <input type="hidden" name="nomor_antri" value="<?= $data->nomor_antri ?>">
                                                            <input type="hidden" name="nama_lengkap_pasien" value="<?= $data->nama_lengkap_pasien ?>">
                                                            <input type="hidden" name="id_biaya" value="<?= $data->id_biaya ?>">
                                                            <button type="submit" class="btn btn-primary ">
                                                                <i class="bi bi-printer-fill"></i>
                                                            </button>
                                                        </form>
                                                    <?php } else { ?>
                                                        <span class="p-2 ">Belum Ada</span>
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

<?php foreach ($pendaftaran as $dataModal) : ?>

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
                                <div class="col-12">
                                    <label class="form-label">Tata tertib, Hak dan Kewajiban Pasien Diserahkan Kepada Pasien / Keluarga</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->ketentuan_rs_ke_pasien ?>" readonly>
                                </div>
                            </form><!-- Vertical Form -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Penangung Jawab -->
    <div class="modal fade" id="modalPJ<?= $dataModal->id_pendaftaran ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi Penanngung Jawab</h5>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body g-3">
                            <!-- Vertical Form -->
                            <form class="row g-3 mt-2">
                                <div class="col-12">
                                    <label class="form-label">Penanggung Jawab</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->penanggung_jawab ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->nama_penanggung_jawab ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Hubungan</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->hubungan ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Alamat Lengkap</label>
                                    <textarea class="form-control" style="height: 100px" readonly><?= $dataModal->alamat_penanggung_jawab ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nomor HP</label>
                                    <input type="text" class="form-control" value="<?= $dataModal->nomor_hp_penanggung_jawab ?>" readonly>
                                </div>
                            </form><!-- Vertical Form -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalHapus<?= $dataModal->id_pendaftaran ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Pendafataran</h5>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin untuk menghapus data pendaftaran ini?
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url() ?>pendaftaran/hapus_pendaftaran" method="post">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <input type="hidden" name="id_pendaftaran" value="<?= $dataModal->id_pendaftaran ?>">
                        <button type="submit" class="btn btn-primary">Ya, lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->
<?php endforeach ?>