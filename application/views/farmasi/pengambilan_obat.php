<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pembayaran</h1>
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
                                        <th>Nama Pasien</th>
                                        <th>Nomor Rekam Medis</th>
                                        <th>Obat yang diambil</th>
                                        <th>Keterangan</th>
                                        <th>Waktu Pengambilan</th>
                                        <th style="width: 10%;" class="text-center" data-sortable="false">Aksi</th>
                                        <th style="width: 10%;" class="text-center" data-sortable="false">Cetak Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pengambilan_obat as $data) : ?>
                                        <tr>
                                            <td><?= $data->nama_lengkap_pasien ?></td>
                                            <td><?= $data->nomor_rekam_medis ?></td>
                                            <td><?= $data->obat_yang_diambil ?></td>
                                            <td><?= $data->keterangan_pengambilan_obat ?></td>
                                            <td><?= date('d-F-Y', strtotime($data->waktu_pengambilan_obat)) ?>, Jam <?= date('H:i', strtotime($data->waktu_pengambilan_obat)) ?></td>
                                            <td class="text-center">
                                                <div class="class=" d-inline-block me-1 mb-1"">
                                                    <form action="<?= base_url('farmasi/edit_pengambilan_obat') ?>" method="post">
                                                        <input type="hidden" name="id_pengambilan_obat" value="<?= $data->id_pengambilan_obat ?>">
                                                        <button type="submit" class="btn btn-primary ">
                                                            Edit <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="class=" d-inline-block me-1 mb-1"">
                                                    <form action="<?= base_url('farmasi/cetak_nota') ?>" target="_blank" method="post">
                                                        <input type="hidden" name="id_pengambilan_obat" value="<?= $data->id_pengambilan_obat ?>">
                                                        <button type="submit" class="btn btn-primary ">
                                                            <i class="bi bi-printer-fill"></i>
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