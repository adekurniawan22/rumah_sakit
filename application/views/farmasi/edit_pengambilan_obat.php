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
                            <!--  -->
                            <hr class="border border-primary border-3 opacity-50 mt-2 mb-4">
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
                                    <?php
                                    // Menghapus tanda kurung beserta angka di dalam string
                                    $cleaned_string = preg_replace('/\s*\(\d+\)(,*)/', '$1', $pengambilan_obat[0]->obat_yang_diambil);;

                                    $result = trim($cleaned_string, ", ");
                                    $obat_yang_diambil_data = explode(', ', $result);
                                    ?>

                                    <?php foreach ($obat as $dataObat) : ?>
                                        <tr>
                                            <td><input type="checkbox" class="select-checkbox" name="select_obat[]" value="<?= $dataObat->nama_obat ?>" data-name="<?= $dataObat->nama_obat ?>"></td>
                                            <td <?php echo (in_array($dataObat->nama_obat, $obat_yang_diambil_data)) ? 'style="background-color: green;"' : ''; ?>><?= $dataObat->nama_obat ?></td>
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
                                <div id="selectedText" class="col-sm-10">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan_pengambilan_obat" class="col-sm-2 col-form-label">Keterangan Pengambilan Obat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="keterangan_pengambilan_obat" style="height: 100px"><?php echo set_value('keterangan_pengambilan_obat', $pengambilan_obat[0]->keterangan_pengambilan_obat); ?></textarea>
                                    <?= form_error('keterangan_pengambilan_obat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="catatan" style="height: 100px"><?php echo set_value('catatan', $pengambilan_obat[0]->catatan); ?></textarea>
                                    <?= form_error('catatan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
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
    $(document).ready(function() {
        // Menyimpan status centang pada obat yang telah dipilih sebelumnya
        var obatTerpilih = <?= json_encode($obat_yang_diambil_data) ?>;

        // Fungsi untuk mengupdate teks obat_diambil ketika checkbox diubah
        $('.select-checkbox').change(function() {
            updateSelectedText();
        });

        // Fungsi untuk memperbarui nilai obat_diambil
        function updateSelectedText() {
            var selectedText = '';
            $('.select-checkbox:checked').each(function() {
                selectedText += $(this).val() + '<br>';
            });

            // Memperbarui isi dari div dengan ID selectedText
            $('#selectedText').html(selectedText);
        }

        // Memulai dengan memperbarui teks ketika dokumen siap
        updateSelectedText();

        // Memeriksa dan mencentang kembali obat yang telah dipilih sebelumnya
        obatTerpilih.forEach(function(obat) {
            $('input[name="select_obat[]"][value="' + obat + '"]').prop('checked', true);
        });
    });
</script>

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