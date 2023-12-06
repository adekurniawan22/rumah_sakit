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
                                        <th>ID Pendaftaran</th>
                                        <th>Nama Pasien</th>
                                        <th>Nomor Rekam Medis</th>
                                        <th>Biaya</th>
                                        <th>Keterangan Pembayaran</th>
                                        <th class="text-center" data-sortable="false">Aksi</th>
                                        <th class="text-center" data-sortable="false">Cetak Antri</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pembayaran as $data) : ?>
                                        <tr>
                                            <td><?= $data->id_pendaftaran ?></td>
                                            <td><?= $data->nama_lengkap_pasien ?></td>
                                            <td><?= $data->nomor_rekam_medis ?></td>
                                            <td>Rp. <?= number_format($data->harga_biaya, 0) ?></td>
                                            <td><?= $data->nama_biaya ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary d-inline-block me-1 mb-1" data-bs-toggle="modal" data-bs-target="#modalPasien<?= $data->id_pembayaran ?>">
                                                    Edit <i class="bi bi-pencil-square"></i>
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <div class="class=" d-inline-block me-1 mb-1"">
                                                    <?php if ($data->nomor_antri) { ?>
                                                        <form action="<?= base_url('qr/buat_qr_code') ?>" target="_blank" method="post">
                                                            <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                                                            <input type="hidden" name="nama_poliklinik" value="<?= $data->nama_poliklinik ?>">
                                                            <input type="hidden" name="nomor_antri" value="<?= $data->nomor_antri ?>">
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
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<?php foreach ($pembayaran as $dataModal) : ?>
    <!-- Modal Pasien -->
    <div class="modal fade" id="modalPasien<?= $dataModal->id_pembayaran ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pembayaran</h5>
                </div>
                <div class="modal-body">
                    <form class="row mt-2" action="<?= base_url() ?>kasir/proses_edit_pembayaran" method="post">
                        <input type="hidden" name="id_pembayaran" value="<?= $dataModal->id_pembayaran ?>">
                        <label class="col-sm-3 col-form-label">Jenis Biaya</label>
                        <div class="col-sm-9">
                            <select id="id_biaya" class="form-select" aria-label="Default select example" name="id_biaya" required>
                                <option value="" selected>Pilih Jenis Biaya</option>
                                <?php foreach ($biaya as $b) : ?>
                                    <option value="<?= $b->id_biaya ?>" <?php echo set_select('id_biaya', $b->id_biaya, $b->id_biaya == $dataModal->id_biaya); ?>><?= $b->nama_biaya ?> - Rp. <?= number_format($b->harga_biaya, 0) ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('id_biaya', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>