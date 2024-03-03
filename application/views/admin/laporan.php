<main id="main" class="main">

    <div class="pagetitle">
        <h1 class="ms-1">Laporan Pasien
            <div class=" d-inline-block me-1 mb-1">
                <a href="<?= base_url('admin/cetak_laporan_pasien') ?>" target="_blank" method="post">
                    <input type="hidden" name="id_pengambilan_obat">
                    <button type="submit" class="btn btn-primary ">
                        <i class="bi bi-printer-fill"></i>
                    </button>
                </a>
            </div>
        </h1>

    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <?= $this->session->flashdata('message');
                        unset($_SESSION['message']); ?>
                        <div class="table-container mt-2">
                            <table id="example2" class="table my-4">
                                <thead>
                                    <tr>
                                        <th>Bulan</th>
                                        <th class="text-center">Pasien Baru</th>
                                        <th class="text-center">Pasien Lama</th>
                                        <th class="text-center">BPJS</th>
                                        <th class="text-center">Pasien Umum</th>
                                        <th class="text-center">Pasien Laki-laki</th>
                                        <th class="text-center">Pasien Perempuan</th>
                                        <th class="text-center">Jumlah Diagnosa</th>
                                        <th class="text-center">Daftar Diagnosa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_bulan as $bulan) { ?>
                                        <tr>
                                            <td><?= $bulan['nama_bulan'] ?></td>
                                            <td class="text-center"><?= $jumlah_data_per_bulan[$bulan['bulan']]['pasien_baru'] ?></td>
                                            <td class="text-center"><?= $jumlah_data_per_bulan[$bulan['bulan']]['pasien_lama'] ?></td>
                                            <td class="text-center"><?= $jumlah_data_per_bulan[$bulan['bulan']]['jumlah_bpjs'] ?></td>
                                            <td class="text-center"><?= $jumlah_data_per_bulan[$bulan['bulan']]['jumlah_bayar'] ?></td>
                                            <td class="text-center"><?= $jumlah_data_per_bulan[$bulan['bulan']]['jumlah_laki_laki'] ?></td>
                                            <td class="text-center"><?= $jumlah_data_per_bulan[$bulan['bulan']]['jumlah_perempuan'] ?></td>
                                            <td class="text-center"><?= $jumlah_data_per_bulan[$bulan['bulan']]['jumlah_diagnosa_utama'] ?></td>
                                            <td style="text-align: center;">
                                                <?php if (!empty($jumlah_data_per_bulan[$bulan['bulan']]['diagnosa_utama'])) : ?>
                                                    <ul style="margin: auto; display: inline-block; text-align: left;">
                                                        <?php foreach ($jumlah_data_per_bulan[$bulan['bulan']]['diagnosa_utama'] as $diagnosa) : ?>
                                                            <li><?= $diagnosa ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else : ?>
                                                    <span>-</span>
                                                <?php endif; ?>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <hr>

    <div class="pagetitle">
        <h1 class="ms-1">Laporan Obat
            <div class=" d-inline-block me-1 mb-1">
                <a href="<?= base_url('admin/cetak_laporan_obat') ?>" target="_blank" method="post">
                    <input type="hidden" name="id_pengambilan_obat">
                    <button type="submit" class="btn btn-primary ">
                        <i class="bi bi-printer-fill"></i>
                    </button>
                </a>
            </div>
        </h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <?= $this->session->flashdata('message');
                        unset($_SESSION['message']); ?>
                        <div class="table-container mt-2">
                            <table id="example3" class="table my-4">
                                <thead>
                                    <tr>
                                        <th>Nama Obat</th>
                                        <!-- <th>Stok</th> -->
                                        <?php
                                        // Tampilkan kolom bulan dari Januari hingga bulan sekarang dengan nama bulan dalam bahasa Indonesia
                                        for ($bulan = 1; $bulan <= $bulan_sekarang; $bulan++) {
                                            echo "<th class='text-center'>" . $nama_bulan_indonesia[$bulan - 1] . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_pengembalian_obat as $obat_yang_diambil => $obat) { ?>
                                        <tr>
                                            <td><?php echo $obat['nama_obat']; ?></td>
                                            <!-- <td><?php echo $obat['stok_obat']; ?></td> -->
                                            <?php
                                            for ($bulan = 1; $bulan <= date('m'); $bulan++) {
                                                if (isset($obat['jumlah_pengembalian_obat'][$bulan])) {
                                                    echo "<td class='text-center'>" . $obat['jumlah_pengembalian_obat'][$bulan] . "</td>";
                                                } else {
                                                    echo "<td class='text-center'>0</td>"; // Jika tidak ada data jumlah pengembalian obat untuk bulan ini, isi dengan 0
                                                }
                                            }
                                            ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>