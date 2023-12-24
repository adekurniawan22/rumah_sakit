<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Poliklinik</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="pb-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahPoliklinik">
                                + Tambah Poliklinik
                            </button>
                        </div>
                        <?= $this->session->flashdata('message');
                        unset($_SESSION['message']); ?>
                        <div class="table-container mt-2">
                            <table id="example" class="table my-4">
                                <thead>
                                    <tr>
                                        <th style="width: 80%;">Nama Poliklinik</th>
                                        <th class="text-center" data-sortable="false">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($poliklinik as $p) : ?>
                                        <tr>
                                            <td><?= $p->nama_poliklinik ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary d-inline-block me-1 mb-1" data-bs-toggle="modal" data-bs-target="#modalEditPoliklinik<?= $p->id_poliklinik ?>">
                                                    Edit <i class=" bi bi-pencil-square"></i>
                                                </button>

                                                <button type="button" class="btn btn-primary d-inline-block me-1 mb-1" data-bs-toggle="modal" data-bs-target="#modalHapusPoliklinik<?= $p->id_poliklinik ?>">
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
                <h5 class="modal-title">Tambah Poliklinik</h5>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <!-- Vertical Form -->
                        <form class="row g-3 mt-2" action="<?= base_url('admin/proses_tambah_poliklinik') ?>" method="post">
                            <div class="col-12">
                                <label class="form-label">Nama Polklinik</label>
                                <input type="text" name="nama_poliklinik" class="form-control" required>
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
<?php foreach ($poliklinik as $edit_poliklinik) : ?>
    <div class="modal fade" id="modalEditPoliklinik<?= $edit_poliklinik->id_poliklinik ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Poliklinik</h5>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <!-- Vertical Form -->
                            <form class="row g-3 mt-2" action="<?= base_url('admin/proses_edit_poliklinik') ?>" method="post">
                                <div class="col-12">
                                    <label class="form-label">Nama Polklinik</label>
                                    <input type="hidden" name="id_poliklinik" value="<?= $edit_poliklinik->id_poliklinik ?>" class="form-control">
                                    <input type="text" name="nama_poliklinik" value="<?= $edit_poliklinik->nama_poliklinik ?>" class="form-control" required>
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

    <div class="modal fade" id="modalHapusPoliklinik<?= $edit_poliklinik->id_poliklinik ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Poliklinik</h5>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin untuk menghapus poliklinik ini?
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url() ?>admin/hapus_poliklinik" method="post">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <input type="hidden" name="id_poliklinik" value="<?= $edit_poliklinik->id_poliklinik ?>">
                        <button type="submit" class="btn btn-primary">Ya, lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>