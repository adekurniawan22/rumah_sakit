<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Pengambilan Obat</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <form role="form" action="<?= base_url() ?>farmasi/proses_tambah_pengambilan_obat" method="post">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Hasil Pemeriksaan Dari Dokter</h5>
                            <div class="row mb-3 mt-3">
                                <label for="keluhan_umum" class="col-sm-2 col-form-label">Keluhan Umum</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id_pendaftaran" value="<?= $farmasi[0]->id_pendaftaran; ?>">
                                    <input type="hidden" name="id_pasien" value="<?= $farmasi[0]->id_pasien; ?>">
                                    <input type="hidden" name="id_pemeriksaan2" value="<?= $farmasi[0]->id_pemeriksaan2; ?>">
                                    <input type="text" class="form-control" name="keluhan_umum" value="<?php echo set_value('keluhan_umum', $farmasi[0]->keluhan_umum); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="resep_obat" class="col-sm-2 col-form-label">Resep Obat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="resep_obat" style="height: 100px" readonly><?php echo set_value('resep_obat', $farmasi[0]->resep_obat); ?></textarea>
                                    <?= form_error('resep_obat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Data Pengambilan Obat</h5>
                            <p style="color: red;" class="mb-4">Pastikan jumlah obat sudah benar sebelum menekan tombol tambah!</p>

                            <table id="farmasi" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll"></th>
                                        <th>Nama Obat</th>
                                        <th>Stok Obat</th>
                                        <th>Jumlah Obat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($obat as $dataObat) : ?>
                                        <tr>
                                            <td><input type="checkbox" class="select-checkbox" name="select_obat[]" value="<?= $dataObat->nama_obat ?>" data-name="<?= $dataObat->nama_obat ?>"></td>
                                            <td><?= $dataObat->nama_obat ?></td>
                                            <td><?= $dataObat->stok_obat ?></td>
                                            <td>
                                                <input type="number" class="form-control obat-quantity" name="obat_quantity[]" data-name="<?= $dataObat->nama_obat ?>" value="0" min="0" style="display: none;">
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
                                    <textarea class="form-control" name="keterangan_pengambilan_obat" style="height: 100px"><?php echo set_value('keterangan_pengambilan_obat'); ?></textarea>
                                    <?= form_error('keterangan_pengambilan_obat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="catatan" style="height: 100px"><?php echo set_value('catatan'); ?></textarea>
                                    <?= form_error('catatan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>


                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <a class="btn btn-primary" href="<?= base_url() ?>farmasi">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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
            });
        });
    });
</script>