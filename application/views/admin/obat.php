<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Obat</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="pb-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahObat">
                                + Tambah Obat
                            </button>
                        </div>
                        <?= $this->session->flashdata('message');
                        unset($_SESSION['message']); ?>
                        <div class="table-table-container mt-2">
                            <table id="example" class="table  my-4">
                                <thead>
                                    <tr>
                                        <th>Nama Obat</th>
                                        <th>Harga Obat</th>
                                        <th>Stok Obat</th>
                                        <th class="text-center" style="width: 20%;" data-sortable="false">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($obat as $o) : ?>
                                        <tr>
                                            <td><?= $o->nama_obat ?></td>
                                            <td>Rp. <?= number_format($o->harga_obat, 0) ?></td>
                                            <td><?= $o->stok_obat ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary d-inline-block me-1 mb-1" data-bs-toggle="modal" data-bs-target="#modalEditObat<?= $o->id_obat ?>">
                                                    Edit <i class=" bi bi-pencil-square"></i>
                                                </button>

                                                <button type="button" class="btn btn-primary d-inline-block me-1 mb-1" data-bs-toggle="modal" data-bs-target="#modalHapusObat<?= $o->id_obat ?>">
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

<!-- MODAL TAMBAH OBAT -->
<div class="modal fade" id="modalTambahObat" tabindex="-1">
    <div class="modal-dialog modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Obat</h5>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <!-- Vertical Form -->
                        <form class="row g-3 mt-2" action="<?= base_url('admin/proses_tambah_obat') ?>" method="post">
                            <div class="col-12">
                                <label class="form-label">Nama Obat</label>
                                <input type="text" name="nama_obat" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Harga Obat</label>
                                <input type="text" name="harga_obat" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Stok Obat</label>
                                <input type="text" name="stok_obat" class="form-control" required>
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

<!-- MODAL EDIT OBAT -->
<?php foreach ($obat as $edit_obat) : ?>
    <div class="modal fade" id="modalEditObat<?= $edit_obat->id_obat ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Obat</h5>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <!-- Vertical Form -->
                            <form class="row g-3 mt-2" action="<?= base_url('admin/proses_edit_obat') ?>" method="post">
                                <div class="col-12">
                                    <label class="form-label">Nama Obat</label>
                                    <input type="hidden" name="id_obat" value="<?= $edit_obat->id_obat ?>" class="form-control">
                                    <input type="text" name="nama_obat" value="<?= $edit_obat->nama_obat ?>" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Harga Obat</label>
                                    <input type="text" name="harga_obat" value="<?= $edit_obat->harga_obat ?>" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Stok Obat</label>
                                    <input type="text" name="stok_obat" value="<?= $edit_obat->stok_obat ?>" class="form-control" required>
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

    <!-- MODAL HAPUS OBAT -->
    <div class="modal fade" id="modalHapusObat<?= $edit_obat->id_obat ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Obat</h5>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin untuk menghapus obat ini?
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url() ?>admin/hapus_obat" method="post">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <input type="hidden" name="id_obat" value="<?= $edit_obat->id_obat ?>">
                        <button type="submit" class="btn btn-primary">Ya, lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>