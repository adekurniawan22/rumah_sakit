<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Pemeriksaan 2</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <form role="form" action="<?= base_url() ?>dokter/proses_tambah_pemeriksaan" method="post">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Label Pasien *</h5>
                            <input type="hidden" name="id_pasien" value="<?= $id_pasien ?>">
                            <input type="hidden" name="id_pendaftaran" value="<?= $id_pendaftaran ?>">

                            <!-- General Form Elements -->
                            <div class="row mb-3">
                                <label for="nama_lengkap_pasien" class="col-sm-2 col-form-label">Nama Lengkap Pasien</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_lengkap_pasien" value="<?php echo $pasien[0]->nama_lengkap_pasien ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tanggal_lahir" value="<?php echo $pasien[0]->tanggal_lahir  ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                                <div class="col-sm-10">
                                    <?php
                                    $tanggal_lahir = $pasien[0]->tanggal_lahir;
                                    $umur = date_diff(date_create($tanggal_lahir), date_create('today'))->y;;
                                    ?>
                                    <input type="text" class="form-control" name="umur" value="<?= $umur . " Tahun" ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alamat_lengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat_lengkap" style="height: 100px" readonly><?php echo $pasien[0]->alamat_lengkap; ?></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo $pasien[0]->jenis_kelamin  ?>" readonly>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">

                            <div class="row mb-3">
                                <label for="keluhan_umum" class="col-sm-2 col-form-label">Keluhan Umum</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="keluhan_umum" value="<?php echo set_value('keluhan_umum'); ?>">
                                    <?= form_error('keluhan_umum', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_penyakit_sekarang" class="col-sm-2 col-form-label">Riwayat Penyakit Sekarang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_penyakit_sekarang" value="<?php echo set_value('riwayat_penyakit_sekarang'); ?>">
                                    <?= form_error('riwayat_penyakit_sekarang', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_alergi" class="col-sm-2 col-form-label">Riwayat Alergi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_alergi" value="<?php echo set_value('riwayat_alergi'); ?>">
                                    <?= form_error('riwayat_alergi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_penyakit_dahulu" class="col-sm-2 col-form-label">Riwayat Penyakit Dahulu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_penyakit_dahulu" value="<?php echo set_value('riwayat_penyakit_dahulu'); ?>">
                                    <?= form_error('riwayat_penyakit_dahulu', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_pengobatan" class="col-sm-2 col-form-label">Riwayat Pengobatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_pengobatan" value="<?php echo set_value('riwayat_pengobatan'); ?>">
                                    <?= form_error('riwayat_pengobatan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="riwayat_penyakit_keluarga" class="col-sm-2 col-form-label">Riwayat Penyakit Keluarga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="riwayat_penyakit_keluarga" value="<?php echo set_value('riwayat_penyakit_keluarga'); ?>">
                                    <?= form_error('riwayat_penyakit_keluarga', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="pemeriksaan" class="col-sm-2 col-form-label">Pemeriksaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pemeriksaan" value="<?php echo set_value('pemeriksaan'); ?>">
                                    <?= form_error('pemeriksaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="diagnosa_utama" class="col-sm-2 col-form-label">Diagnosa Utama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diagnosa_utama" value="<?php echo set_value('diagnosa_utama'); ?>">
                                    <?= form_error('diagnosa_utama', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="diagnosa_tambahan" class="col-sm-2 col-form-label">Diagnosa Tambahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diagnosa_tambahan" value="<?php echo set_value('diagnosa_tambahan'); ?>">
                                    <?= form_error('diagnosa_tambahan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="planning" class="col-sm-2 col-form-label">Planning</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="planning" value="<?php echo set_value('planning'); ?>">
                                    <?= form_error('planning', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tindakan" class="col-sm-2 col-form-label">Tindakan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tindakan" value="<?php echo set_value('tindakan'); ?>">
                                    <?= form_error('tindakan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edukasi" class="col-sm-2 col-form-label">Edukasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="edukasi" value="<?php echo set_value('edukasi'); ?>">
                                    <?= form_error('edukasi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <hr class="border border-primary border-3 opacity-50 mt-5">
                            <h5 class="card-title">Rencana Pulang / Discharge Planning *</h5>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Apakah ada rencana kontrol?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rencana_kontrol" value="Tidak ada alergi" onclick="toggleInputField('Tidak tampil', 'input_teks_alergi', 'Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Tidak ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Sudah Ditetapkan
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rencana_kontrol" value="Ada alergi" onclick="toggleInputField('Tampil', 'input_teks_alergi','Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Belum Ditetapkan
                                        </label>
                                    </div>
                                    <?= form_error('alergi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_alergi" style="display: none;" placeholder="Masukkan alergi seperti apa">
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Perlu Pelayanan Home Care?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pelayanan_home_care" value="Tidak ada alergi" onclick="toggleInputField('Tidak tampil', 'input_teks_alergi', 'Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Tidak ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pelayanan_home_care" value="Ada alergi" onclick="toggleInputField('Tampil', 'input_teks_alergi','Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('alergi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_alergi" style="display: none;" placeholder="Masukkan alergi seperti apa">
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Perlu Kontrol ke Poliklinik?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kontrol_ke_poliklinik" value="Tidak ada alergi" onclick="toggleInputField('Tidak tampil', 'input_teks_alergi', 'Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Tidak ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kontrol_ke_poliklinik" value="Ada alergi" onclick="toggleInputField('Tampil', 'input_teks_alergi','Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('alergi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_alergi" style="display: none;" placeholder="Masukkan alergi seperti apa">
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Perlu Penggunaan Alat Medis/Bantu ?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perlu_penggunaan_alat" value="Tidak ada alergi" onclick="toggleInputField('Tidak tampil', 'input_teks_alergi', 'Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Tidak ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perlu_penggunaan_alat" value="Ada alergi" onclick="toggleInputField('Tampil', 'input_teks_alergi','Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('alergi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_alergi" style="display: none;" placeholder="Masukkan alergi seperti apa">
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Telah dilakukan pemesanan alat?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="telah_memesan_alat" value="Tidak ada alergi" onclick="toggleInputField('Tidak tampil', 'input_teks_alergi', 'Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Tidak ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="telah_memesan_alat" value="Ada alergi" onclick="toggleInputField('Tampil', 'input_teks_alergi','Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('alergi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_alergi" style="display: none;" placeholder="Masukkan alergi seperti apa">
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Dirujuk ke komunitas tertentu?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dirujuk_ke_komunitas" value="Tidak ada alergi" onclick="toggleInputField('Tidak tampil', 'input_teks_alergi', 'Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Tidak ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dirujuk_ke_komunitas" value="Ada alergi" onclick="toggleInputField('Tampil', 'input_teks_alergi','Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('alergi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_alergi" style="display: none;" placeholder="Masukkan alergi seperti apa">
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Dirujuk ke tim terapis?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dirujuk_ke_terapis" value="Tidak ada alergi" onclick="toggleInputField('Tidak tampil', 'input_teks_alergi', 'Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Tidak ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dirujuk_ke_terapis" value="Ada alergi" onclick="toggleInputField('Tampil', 'input_teks_alergi','Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('alergi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_alergi" style="display: none;" placeholder="Masukkan alergi seperti apa">
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Dirujuk ke ahli gizi?</legend>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dirujuk_ke_ahli_gizi" value="Tidak ada alergi" onclick="toggleInputField('Tidak tampil', 'input_teks_alergi', 'Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Tidak ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dirujuk_ke_ahli_gizi" value="Ada alergi" onclick="toggleInputField('Tampil', 'input_teks_alergi','Tidak ada alergi', 'Ada alergi')" <?php echo set_radio('alergi', 'Ada alergi'); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                    <?= form_error('alergi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input type="text" class="form-control mt-3" id="input_teks_alergi" style="display: none;" placeholder="Masukkan alergi seperti apa">
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label for="lain_lain" class="col-sm-4 col-form-label">Lain-lain</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="lain_lain" value="<?php echo set_value('lain_lain'); ?>">
                                    <?= form_error('lain_lain', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-8">
                                    <a class="btn btn-primary" href="<?= base_url() ?>dokter">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

    handleLainnya("tinggal_bersama", "tinggal_bersama_lainnya", "Lainnya");
    handleLainnya("status_melarikan_diri", "status_melarikan_diri_minggat", "Minggat");
</script>
<script>
    function handleLainnya2(selectElementId, inputElementId, lainnya) {
        var selectElement = document.getElementById(selectElementId);
        var inputElement = document.getElementById(inputElementId);
        var hiddenInputElement = document.getElementById("hidden_" + selectElementId);

        selectElement.addEventListener("change", function() {
            if (selectElement.value === lainnya) {
                inputElement.style.display = "block";
            } else {
                inputElement.style.display = "none";
                hiddenInputElement.value = selectElement.value;
            }
        });

        inputElement.addEventListener("input", function() {
            if (selectElement.value === lainnya) {
                var penyambung = "";
                if (selectElement.value === "Dirawat") {
                    penyambung = "di ruangan"
                } else if (selectElement.value === "Meninggal") {
                    penyambung = "pada pukul"
                } else if (selectElement.value === "Dirujuk") {
                    penyambung = "ke"
                }
                // Gabungkan value dropdown dengan teks yang dimasukkan oleh pengguna
                var newValue = selectElement.value + " " + penyambung + " " + inputElement.value;
                hiddenInputElement.value = newValue;
            }
        });
    }

    handleLainnya2("keadaan_pasien_pulang", "keadaan_pasien_pulang_dirawat", "Dirawat");
    handleLainnya2("keadaan_pasien_pulang", "keadaan_pasien_pulang_meninggal", "Meninggal");
    handleLainnya2("keadaan_pasien_pulang", "keadaan_pasien_pulang_dirujuk", "Dirujuk");
</script>
<script>
    function toggleInputField(selectedOption, id_input, value1, value2) {
        var inputTeksOpsi = document.getElementById(id_input);
        var radio1 = document.querySelector('input[value="' + value1 + '"]');
        var radio2 = document.querySelector('input[value="' + value2 + '"]');
        var name = radio1.getAttribute("name");

        if (selectedOption === 'Tampil') {
            inputTeksOpsi.style.display = "block";
            inputTeksOpsi.setAttribute('name', name)
            radio1.checked = false;
            radio2.checked = true;
        } else {
            inputTeksOpsi.style.display = "none";
            inputTeksOpsi.removeAttribute("name");
            radio1.checked = true;
            radio2.checked = false;
        }
    }
</script>