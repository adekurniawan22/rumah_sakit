<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Obat</h1>
    </div><!-- End Page Title -->

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
                        <div class="table-container">
                            <table id="example" class="table datatable table-striped my-4">
                                <thead>
                                    <tr>
                                        <th>Nama Obat</th>
                                        <th>Harga Obat</th>
                                        <th data-sortable="false">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($obat as $o) : ?>
                                        <tr>
                                            <td><?= $o->nama_obat ?></td>
                                            <td><?= $o->harga_obat ?></td>
                                            <td>
                                                <div class="d-inline p-2">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditObat<?= $o->id_obat ?>">
                                                        <i class=" bi bi-pencil-square"></i>
                                                    </button>
                                                </div>
                                                <div class="d-inline p-2">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalHapusObat<?= $o->id_obat ?>">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
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
</main><!-- End #main -->

<!-- MODAL TAMBAH POLIKLINIK -->
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
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDIT POLIKLINIK -->
<?php foreach ($obat as $edit_obat) : ?>
    <div class="modal fade" id="modalEditObat<?= $edit_obat->id_obat ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Biaya</h5>
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
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        centerTextInColumn('#example', 2);
    });
</script>