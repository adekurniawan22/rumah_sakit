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
                                        <th>Keterangan</th>
                                        <th>Waktu Pengambilan</th>
                                        <th class="text-center" data-sortable="false">Aksi</th>
                                        <th style="width: 10%;" class="text-center" data-sortable="false">Cetak Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pengambilan_obat as $data) : ?>
                                        <tr>
                                            <td><?= $data->nama_lengkap_pasien ?></td>
                                            <td><?= $data->nomor_rekam_medis ?></td>
                                            <td>
                                                <?php
                                                if ($data->keterangan_pengambilan_obat) {
                                                    echo $data->keterangan_pengambilan_obat;
                                                } else {
                                                    echo "Tidak ada";
                                                };
                                                ?>
                                            </td>
                                            <td><?= date('d-F-Y', strtotime($data->waktu_pengambilan_obat)) ?>, Jam <?= date('H:i', strtotime($data->waktu_pengambilan_obat)) ?></td>
                                            <td class="text-center">
                                                <div class="d-inline-block me-1 mb-1">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPengambilanObat<?= $data->id_pendaftaran ?>">
                                                        Detail <i class="bi bi-eye-fill"></i>
                                                    </button>
                                                </div>

                                                <div class="d-inline-block me-1 mb-1">
                                                    <form action="<?= base_url('farmasi/edit_pengambilan_obat') ?>" method="post">
                                                        <input type="hidden" name="id_pengambilan_obat" value="<?= $data->id_pengambilan_obat ?>">
                                                        <button type="submit" class="btn btn-primary ">
                                                            Edit <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class=" d-inline-block me-1 mb-1"">
                                                    <form action=" <?= base_url('farmasi/cetak_nota') ?>" target="_blank" method="post">
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

<?php foreach ($pengambilan_obat as $dataModal) : ?>
    <!-- Modal Pasien -->
    <div class="modal fade" id="modalPengambilanObat<?= $dataModal->id_pendaftaran ?>" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi Pengambilan Obat</h5>
                </div>
                <div class="modal-body">
                    <?php
                    $this->db->where('id_pendaftaran', $dataModal->id_pendaftaran);
                    $pengambilan = $this->db->get('t_pengambilan_obat')->result();
                    ?>
                    <?php foreach ($pengambilan as $p) : ?>
                        <ul>
                            <?php
                            $this->db->where('id_obat', $p->obat_yang_diambil);
                            $query = $this->db->get('t_obat')->row();
                            ?>
                            <li>
                                <?= $query->nama_obat ?>
                                <ul>
                                    <li>Jumlah : <?= $p->jumlah ?> pcs</li>
                                    <li>Catatan : <?= $p->catatan ?></li>
                                </ul>
                            </li>
                        </ul>
                    <?php endforeach ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>