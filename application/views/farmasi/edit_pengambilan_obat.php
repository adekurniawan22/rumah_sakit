<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Pengambilan Obat</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <form role="form" action="<?= base_url() ?>farmasi/proses_edit_pengambilan_obat" method="post">
                    <div class="card">
                        <div class="card-body pt-4">
                            <input type="hidden" class="form-control" name="id_pengambilan_obat" value="<?php echo $pengambilan_obat[0]->id_pengambilan_obat; ?>">
                            <input type="hidden" class="form-control" name="id_pendaftaran" value="<?php echo $pengambilan_obat[0]->id_pendaftaran; ?>">
                            <input type="hidden" class="form-control" name="id_pasien" value="<?php echo $pengambilan_obat[0]->id_pasien; ?>">
                            <input type="hidden" class="form-control" name="id_pegawai" value="<?php echo $pengambilan_obat[0]->id_pegawai; ?>">
                            <input type="hidden" class="form-control" name="waktu_pengambilan_obat" value="<?php echo $pengambilan_obat[0]->waktu_pengambilan_obat; ?>">

                            <strong>
                                <em>
                                    <p class="mb-2">Berikut adalah data pengambilan obat yg sebelumnya di input, Pastikan jumlah dan catatan obat sudah benar sebelum menekan tombol edit!</p>
                                </em>
                            </strong>

                            <?php
                            $this->db->where('id_pendaftaran', $pengambilan_obat[0]->id_pendaftaran);
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

                            <hr class="border border-primary border-3 opacity-50 mt-2 mb-4">
                            <table id="farmasi" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll"></th>
                                        <th>Nama Obat</th>
                                        <th>Stok Obat</th>
                                        <th>Jumlah Obat</th>
                                        <th style="width: 40%;">Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($obat as $dataObat) : ?>
                                        <tr>
                                            <td><input type="checkbox" class="select-checkbox" name="select_obat[]" value="<?= $dataObat->nama_obat ?>" data-name="<?= $dataObat->id_obat ?>"></td>
                                            <td><?= $dataObat->nama_obat ?></td>
                                            <td>
                                                <?php
                                                $totalPengambilan = 0; // Inisialisasi total pengambilan
                                                foreach ($pengambilan as $p) {
                                                    // Periksa apakah pengambilan terkait dengan obat yang sedang diproses
                                                    if ($p->obat_yang_diambil == $dataObat->id_obat) {
                                                        $totalPengambilan += $p->jumlah; // Tambahkan jumlah pengambilan ke total
                                                    }
                                                }
                                                // Tampilkan stok obat setelah semua pengambilan dijumlahkan
                                                echo $dataObat->stok_obat + $totalPengambilan;
                                                ?>
                                            </td>

                                            <td>
                                                <input type="hidden" class="form-control id-obat" name="id_obat[]" data-name="<?= $dataObat->id_obat ?>" value="" style="display: none;">

                                                <input type="number" class="form-control obat-quantity" name="obat_quantity[]" data-name="<?= $dataObat->id_obat ?>" value="0" min="0" style="display: none;">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control catatan-quantity" name="obat_catatan[]" data-name="<?= $dataObat->id_obat ?>" placeholder="Catatan" style="display: none;">
                                            </td>
                                        </tr>

                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <hr class="border border-primary border-3 opacity-50 mt-5">

                            <div class="row mb-3 mt-4">
                                <div class="col-sm-2">Nama Obat</div>
                                <div id="selectedText" class="col-sm-10"><?= form_error('select_obat[]', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?></div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan_pengambilan_obat" class="col-sm-2 col-form-label">Keterangan Pengambilan Obat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="keterangan_pengambilan_obat" style="height: 100px"><?php echo set_value('keterangan_pengambilan_obat', $pengambilan_obat[0]->keterangan_pengambilan_obat); ?></textarea>
                                    <?= form_error('keterangan_pengambilan_obat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <a class="btn btn-primary" href="<?= base_url() ?>farmasi/pengambilan_obat">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = document.querySelectorAll(".select-checkbox");
        const quantityInputs = document.querySelectorAll(".obat-quantity");
        const catatanInputs = document.querySelectorAll(".catatan-quantity");
        const idObatInputs = document.querySelectorAll(".id-obat");

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", function() {
                const isChecked = checkbox.checked;
                const obatName = checkbox.getAttribute("data-name");

                quantityInputs.forEach((quantityInput) => {
                    if (quantityInput.getAttribute("data-name") === obatName) {
                        if (isChecked) {
                            quantityInput.style.display = "block"; // Tampilkan input
                        } else {
                            quantityInput.style.display = "none"; // Sembunyikan input
                            quantityInput.value = 0; // Setel nilai menjadi 0
                        }
                    }
                });

                catatanInputs.forEach((catatanInput) => {
                    if (catatanInput.getAttribute("data-name") === obatName) {
                        if (isChecked) {
                            catatanInput.style.display = "block"; // Tampilkan input
                        } else {
                            catatanInput.style.display = "none"; // Sembunyikan input
                            catatanInput.value = ''; // Kosongkan nilai input
                        }
                    }
                });

                idObatInputs.forEach((idObatInput) => {
                    if (idObatInput.getAttribute("data-name") === obatName) {
                        if (isChecked) {
                            idObatInput.value = obatName; // Kosongkan nilai input
                        } else {
                            idObatInput.value = ''; // Kosongkan nilai input
                        }
                    }
                });
            });
        });
    });
</script>