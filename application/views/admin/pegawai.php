<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pegawai</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="pb-3">
                            <a href="<?= base_url() ?>admin/tambah_pegawai" class="btn btn-primary">+ Tambah Pegawai</a>
                        </div>
                        <?= $this->session->flashdata('message');
                        unset($_SESSION['message']); ?>
                        <div class="table-container">
                            <!-- Table with stripped rows -->
                            <table id="example" class="table datatable table-striped my-4">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>NP</th>
                                        <th>Role</th>
                                        <th>Status Akun</th>
                                        <th data-sortable="false">Informasi</th>
                                        <th data-sortable="false">Edit</th>
                                        <th data-sortable="false">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><img style="width: 60px;" src="<?= base_url('assets/img/profile/') . $user['foto'] ?>"></td>
                                            <td><?= $user['nama_lengkap'] ?></td>
                                            <td><?= $user['nomor_pegawai'] ?></td>
                                            <td><?= $user['nama_role'] ?></td>
                                            <td><?php
                                                if ($user['status_aktif'] == 1) {
                                                    echo "Aktif";
                                                } else {
                                                    echo "Tidak Aktif";
                                                }
                                                ?>
                                            </td>
                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUser<?= $user['id_pegawai'] ?>">
                                                    Detail <i class="bi bi-eye-fill"></i>
                                                </button></td>
                                            <td>
                                                <form action="<?= base_url() ?>admin/edit_pegawai" method="post">
                                                    <input type="hidden" name="id_pegawai" value="<?= $user['id_pegawai'] ?>">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class=" bi bi-pencil-square"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalHapusUser<?= $user['id_pegawai'] ?>">
                                                    <i class="bi bi-trash"></i>
                                                </button>
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

<?php foreach ($users as $userModal) : ?>

    <!-- Modal Detail -->
    <div class="modal fade" id="modalUser<?= $userModal['id_pegawai'] ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi User</h5>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <!-- Vertical Form -->
                            <form class="row g-3 mt-2">
                                <div class="col-12 d-flex justify-content-center">
                                    <img style="width: 100px;" src="<?= base_url('assets/img/profile/') . $user['foto'] ?>">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nomor Pegawai</label>
                                    <input type="text" class="form-control" value="<?= $userModal['nomor_pegawai'] ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Role</label>
                                    <input type="text" class="form-control" value="<?= $userModal['nama_role'] ?>" readonly>
                                </div>
                                <?php if ($userModal['id_poliklinik'] != 0) { ?>
                                    <div class="col-12">
                                        <label class="form-label">Poliklinik</label>
                                        <input type="text" class="form-control" value="<?= $userModal['nama_poliklinik'] ?>" readonly>
                                    </div>
                                <?php } ?>
                                <div class="col-12">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" value="<?= $userModal['username'] ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="<?= $userModal['nama_lengkap'] ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Jenis kelamin</label>
                                    <input type="text" class="form-control" value="<?= $userModal['jenis_kelamin'] ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Alamat Lengkap</label>
                                    <textarea class="form-control" style="height: 100px" readonly><?= $userModal['alamat'] ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nomor HP</label>
                                    <input type="text" class="form-control" value="<?= $userModal['nomor_hp'] ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Status Aktif</label>
                                    <input type="text" class="form-control" value="<?php
                                                                                    if ($userModal['status_aktif'] == 1) {
                                                                                        echo "Aktif";
                                                                                    } else {
                                                                                        echo "Tidak Aktif";
                                                                                    }
                                                                                    ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Tanggal Akun Dibuat</label>
                                    <input type="text" class="form-control" value="<?= date('d-F-Y', strtotime($userModal['tanggal_dibuat']))  ?>" readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="modalHapusUser<?= $userModal['id_pegawai'] ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus User</h5>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin untuk menghapus user ini?
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url() ?>admin/hapus_pegawai" method="post">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <input type="hidden" name="id_pegawai" value="<?= $userModal['id_pegawai'] ?>">
                        <button type="submit" class="btn btn-primary">Ya, lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->
<?php endforeach ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        centerTextInColumn('#example', 5);
        centerTextInColumn('#example', 6);
        centerTextInColumn('#example', 7);
    });
</script>