<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Rekam Medis</h1>
    </div>

    <section class="section">
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
                                                <form action=" <?= base_url('rekam_medis/print') ?>" target="_blank" method="post" class="d-inline-block me-1 mb-1">
                                                    <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                                                    <button type="submit" class="btn btn-primary ">
                                                        <i class="bi bi-printer-fill"></i>
                                                    </button>
                                                </form>

                                                <form action="<?= base_url('rekam_medis/pdf') ?>" target="_blank" method="post" class="d-inline-block me-1 mb-1">
                                                    <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                                                    <input type="hidden" name="nama_lengkap_pasien" value="<?= $data->nama_lengkap_pasien ?>">
                                                    <input type="hidden" name="nama_poliklinik" value="<?= $data->nama_poliklinik ?>">
                                                    <button type="submit" class="btn btn-primary ">
                                                        <i class="bi bi-download"></i>
                                                    </button>
                                                </form>
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