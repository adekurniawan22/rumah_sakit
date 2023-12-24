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

                            <table id="farmasi" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll"></th>
                                        <th>Nama Obat</th>
                                        <th>Stok Obat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $obat_yang_diambil_data = explode(', ', $pengambilan_obat[0]->obat_yang_diambil) ?>
                                    <?php foreach ($obat as $dataObat) : ?>
                                        <tr>
                                            <td><input type="checkbox" class="select-checkbox" name="select_obat[]" value="<?= $dataObat->nama_obat ?>" data-name="<?= $dataObat->nama_obat ?>" <?php echo (in_array($dataObat->nama_obat, $obat_yang_diambil_data)) ? 'checked' : ''; ?>></td>
                                            <td><?= $dataObat->nama_obat ?></td>
                                            <td><?= $dataObat->stok_obat ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                            <div class="row mb-3 mt-4">
                                <div class="col-sm-2">Nama Obat</div>
                                <div id="selectedText" class="col-sm-10">
                                    <?php foreach ($obat_yang_diambil_data as $obat_diambil) : ?>
                                        <ul>
                                            <li><?= $obat_diambil ?></li>
                                        </ul>
                                    <?php endforeach ?>
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