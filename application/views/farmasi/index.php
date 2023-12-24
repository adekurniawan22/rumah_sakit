<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Antrian Pembayaran</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-xxl-3 col-md-12">
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

                            <table id="example" class="table my-4">
                                <thead>
                                    <tr>
                                        <th>ID Pemeriksaan 2</th>
                                        <th>Nama Pasien</th>
                                        <th>Nomor Rekam Medis</th>
                                        <th class="text-center" data-sortable="false">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($farmasi as $data) : ?>
                                        <tr>
                                            <td><?= $data->id_pemeriksaan2 ?></td>
                                            <td><?= $data->nama_lengkap_pasien ?></td>
                                            <td><?= $data->nomor_rekam_medis ?></td>
                                            <td class="text-center">
                                                <div class="class=" d-inline-block me-1 mb-1"">
                                                    <form action="<?= base_url('farmasi/tambah_pengambilan_obat') ?>" method="post">
                                                        <input type="hidden" name="id_pemeriksaan2" value="<?= $data->id_pemeriksaan2 ?>">
                                                        <button type="submit" class="btn btn-primary ">
                                                            <i class="bi bi-arrow-right-square-fill"></i> Proses
                                                        </button>
                                                    </form>
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