<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Rekam Medis</h1>
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
                                        <th>Poliklinik</th>
                                        <th class="text-center" data-sortable="false">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rekam_medis as $data) : ?>
                                        <tr>
                                            <td><?= $data->id_pendaftaran ?></td>
                                            <td><?= $data->nama_lengkap_pasien ?></td>
                                            <td><?= $data->nama_poliklinik ?></td>
                                            <td class="text-center">
                                                <form action=" <?= base_url('rekam_medis/tes') ?>" target="_blank" method="post" class="d-inline-block me-1 mb-1">
                                                    <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                                                    <button type="submit" class="btn btn-primary ">
                                                        <i class="bi bi-printer-fill"></i>
                                                    </button>
                                                </form>

                                                <form action="<?= base_url('rekam_medis/tes') ?>" target="_blank" method="post" class="d-inline-block me-1 mb-1">
                                                    <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                                                    <button type="submit" class="btn btn-primary ">
                                                        <i class="bi bi-download"></i>
                                                    </button>
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