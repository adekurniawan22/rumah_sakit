<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Biaya</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="pb-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahPoliklinik">
                                + Tambah Biaya
                            </button>
                        </div>
                        <?= $this->session->flashdata('message');
                        unset($_SESSION['message']); ?>
                        <div class="table-table-container mt-2">
                            <table id="example" class="table  mt-4">
                                <thead>
                                    <tr>
                                        <th>Nama Biaya</th>
                                        <th>Harga Biaya</th>
                                        <th class="text-center" style="width: 20%;" data-sortable="false">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($biaya as $b) : ?>
                                        <tr>
                                            <td><?= $b->nama_biaya ?></td>
                                            <td>Rp. <?= number_format($b->harga_biaya, 0) ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary d-inline-block me-1 mb-1 " data-bs-toggle="modal" data-bs-target="#modalEditBiaya<?= $b->id_biaya ?>">
                                                    Edit <i class=" bi bi-pencil-square"></i>
                                                </button>

                                                <button type="button" class="btn btn-primary d-inline-block me-1 mb-1" data-bs-toggle="modal" data-bs-target="#modalHapusBiaya<?= $b->id_biaya ?>">
                                                    Hapus <i class="bi bi-trash"></i>
                                                </button>
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

<!-- MODAL TAMBAH POLIKLINIK -->
<div class="modal fade" id="modalTambahPoliklinik" tabindex="-1">
    <div class="modal-dialog modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Biaya</h5>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <!-- Vertical Form -->
                        <form class="row g-3 mt-2" action="<?= base_url('admin/proses_tambah_biaya') ?>" method="post">
                            <div class="col-12">
                                <label class="form-label">Nama Biaya</label>
                                <input type="text" name="nama_biaya" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Harga Biaya</label>
                                <input type="text" name="harga_biaya" class="form-control" required>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDIT POLIKLINIK -->
<?php foreach ($biaya as $edit_biaya) : ?>
    <div class="modal fade" id="modalEditBiaya<?= $edit_biaya->id_biaya ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Biaya</h5>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <!-- Vertical Form -->
                            <form class="row g-3 mt-2" action="<?= base_url('admin/proses_edit_biaya') ?>" method="post">
                                <div class="col-12">
                                    <label class="form-label">Nama Biaya</label>
                                    <input type="hidden" name="id_biaya" value="<?= $edit_biaya->id_biaya ?>" class="form-control">
                                    <input type="text" name="nama_biaya" value="<?= $edit_biaya->nama_biaya ?>" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Harga Biaya</label>
                                    <input type="text" name="harga_biaya" value="<?= $edit_biaya->harga_biaya ?>" class="form-control" required>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalHapusBiaya<?= $edit_biaya->id_biaya ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Biaya</h5>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin untuk menghapus biaya ini?
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url() ?>admin/hapus_biaya" method="post">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <input type="hidden" name="id_biaya" value="<?= $edit_biaya->id_biaya ?>">
                        <button type="submit" class="btn btn-primary">Ya, lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>