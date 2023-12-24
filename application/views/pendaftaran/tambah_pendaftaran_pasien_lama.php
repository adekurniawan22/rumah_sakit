<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Pendaftaran</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pilih Pembayaran</h5>

                        <form role="form" action="<?= base_url() ?>pendaftaran/proses_tambah_pendaftaran_pasien_lama" method="post">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jenis Pembayaran</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id_pasien" value="<?= $id_pasien ?>">
                                    <select id="jenis_pembayaran" class="form-select" aria-label="Default select example" name="jenis_pembayaran">
                                        <option value="" selected>Pilih Jenis Pembayaran</option>
                                        <option value="Bayar" <?php echo set_select('jenis_pembayaran', 'Bayar'); ?>>Bayar</option>
                                        <option value="BPJS" <?php echo set_select('jenis_pembayaran', 'BPJS'); ?>>BPJS</option>
                                        <option value="JAMKESDA" <?php echo set_select('jenis_pembayaran', 'JAMKESDA'); ?>>JAMKESDA</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?= form_error('jenis_pembayaran', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input id="jenis_pembayaran_lainnya" type="text" placeholder="Masukan jenis pembayaran lainnya" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Identitas Penanggung Jawab</h5>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Penanggung Jawab</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="penanggung_jawab">
                                        <option value="" selected>Pilih Penanggung Jawab</option>
                                        <option value="Pribadi" <?php echo set_select('penanggung_jawab', 'Pribadi'); ?>>Pribadi</option>
                                        <option value="Keluarga" <?php echo set_select('penanggung_jawab', 'Keluarga'); ?>>Keluarga</option>
                                        <option value="Perusahaan" <?php echo set_select('penanggung_jawab', 'Perusahaan'); ?>>Perusahaan</option>
                                        <option value="Asuransi" <?php echo set_select('penanggung_jawab', 'Asuransi'); ?>>Asuransi</option>
                                    </select>
                                    <?= form_error('penanggung_jawab', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_penanggung_jawab" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_penanggung_jawab" value="<?php echo set_value('nama_penanggung_jawab'); ?>">
                                    <?= form_error('nama_penanggung_jawab', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Hubungan</label>
                                <div class="col-sm-10">
                                    <select id="hubungan" class="form-select" aria-label="Default select example" name="hubungan">
                                        <option value="" selected>Pilih Hubungan</option>
                                        <option value="Orang Tua" <?php echo set_select('hubungan', 'Orang Tua'); ?>>Orang Tua</option>
                                        <option value="Suami" <?php echo set_select('hubungan', 'Suami'); ?>>Suami</option>
                                        <option value="Istri" <?php echo set_select('hubungan', 'Istri'); ?>>Istri</option>
                                        <option value="Anak" <?php echo set_select('hubungan', 'Anak'); ?>>Anak</option>
                                        <option value="Kerabat" <?php echo set_select('hubungan', 'Kerabat'); ?>>Kerabat</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?= form_error('hubungan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input id="hubungan_lainnya" type="text" placeholder="Masukan hubungan lainnya" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alamat_penanggung_jawab" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat_penanggung_jawab" style="height: 100px"><?php echo set_value('alamat_penanggung_jawab'); ?></textarea>
                                    <?= form_error('alamat_penanggung_jawab', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>

                                    <div class="row mt-1">
                                        <div class="col-sm-1 mt-1">
                                            <label for="rt_penanggung_jawab" class="col-form-label">RT</label>
                                            <input type="text" id="rt_penanggung_jawab" name="rt_penanggung_jawab" class="form-control" value="<?= set_value('rt_penanggung_jawab') ?> ">
                                        </div>
                                        <div class="col-sm-1 mt-1">
                                            <label for="rw_penanggung_jawab" class="col-form-label">RW</label>
                                            <input type="text" id="rw_penanggung_jawab" name="rw_penanggung_jawab" class="form-control" value="<?= set_value('rw_penanggung_jawab') ?> ">
                                        </div>
                                        <div class="col-sm-5 mt-1">
                                            <label for="kelurahan_penanggung_jawab" class=" col-form-label">Kelurahan</label>
                                            <input type="text" id="kelurahan_penanggung_jawab" name="kelurahan_penanggung_jawab" class="form-control" value="<?= set_value('kelurahan_penanggung_jawab') ?> ">
                                        </div>
                                        <div class="col-sm-5 mt-1">
                                            <label for="kecamatan_penanggung_jawab" class="col-form-label">Kecamatan</label>
                                            <input type="text" id="kecamatan_penanggung_jawab" name="kecamatan_penanggung_jawab" class="form-control" value="<?= set_value('kecamatan_penanggung_jawab') ?> ">
                                        </div>
                                        <div class="col-sm-6 mt-1">
                                            <label for="kabupaten_penanggung_jawab" class="col-form-label">Kabupaten</label>
                                            <input type="text" id="kabupaten_penanggung_jawab" name="kabupaten_penanggung_jawab" class="form-control" value="<?= set_value('kabupaten_penanggung_jawab') ?> ">
                                        </div>
                                        <div class="col-sm-6 mt-1">
                                            <label for="provinsi_penanggung_jawab" class="col-form-label">Provinsi</label>
                                            <input type="text" id="provinsi_penanggung_jawab" name="provinsi_penanggung_jawab" class="form-control" value="<?= set_value('provinsi_penanggung_jawab') ?> ">
                                        </div>
                                    </div>
                                    <?= form_error('rt', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <?= form_error('rw', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <?= form_error('kelurahan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <?= form_error('kecamatan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <?= form_error('kabupaten', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <?= form_error('provinsi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nomor_hp_penanggung_jawab" class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomor_hp_penanggung_jawab" value="<?php echo set_value('nomor_hp_penanggung_jawab'); ?>">
                                    <?= form_error('nomor_hp_penanggung_jawab', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Poliklinik</label>
                                <div class="col-sm-10">
                                    <select id="poliklinik" class="form-select" aria-label="Default select example" name="id_poliklinik">
                                        <option value="" selected>Pilih Poliklinik</option>
                                        <?php foreach ($poliklinik as $p) : ?>
                                            <option value="<?= $p->id_poliklinik ?>" <?php echo set_select('id_poliklinik', $p->id_poliklinik); ?>><?= $p->nama_poliklinik ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('id_poliklinik', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Tata tertib, Hak dan Kewajiban Pasien Diserahkan Kepada Pasien / Keluarga</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ketentuan_rs_ke_pasien" id="gridRadios1" value="Sudah" <?php echo set_radio('ketentuan_rs_ke_pasien', 'Sudah'); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Sudah
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ketentuan_rs_ke_pasien" id="gridRadios2" value="Belum" <?php echo set_radio('ketentuan_rs_ke_pasien', 'Belum'); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Belum
                                        </label>
                                    </div>
                                    <?= form_error('ketentuan_rs_ke_pasien', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <a class="btn btn-primary" href="<?= base_url() ?>pendaftaran">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>


        </div>
    </section>
</main>

<script>
    function handleLainnya(selectElementId, inputElementId, lainnya) {
        var selectElement = document.getElementById(selectElementId);
        var inputElement = document.getElementById(inputElementId);
        var originalName = selectElement.getAttribute("name"); // Simpan nama asli

        selectElement.addEventListener("change", function() {
            if (selectElement.value === lainnya) {
                inputElement.style.display = "block";
                inputElement.setAttribute("name", originalName); // Set atribut "name" di input
                selectElement.removeAttribute("name"); // Hapus atribut "name" dari select
            } else {
                inputElement.style.display = "none";
                inputElement.removeAttribute("name"); // Hapus atribut "name" dari input jika bukan "lainnya"
                selectElement.setAttribute("name", originalName); // Set atribut "name" kembali di select
            }
        });
    }
    handleLainnya("jenis_pembayaran", "jenis_pembayaran_lainnya", "Lainnya");
    handleLainnya("hubungan", "hubungan_lainnya", "Lainnya");
</script>