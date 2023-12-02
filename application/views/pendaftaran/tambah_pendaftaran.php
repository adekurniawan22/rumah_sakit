<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Pendaftaran</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Identitas Pasien Baru</h5>
                        <!-- General Form Elements -->
                        <form role="form" action="<?= base_url() ?>pendaftaran/proses_tambah_pendaftaran" method="post">
                            <div class="row mb-3">
                                <label for="nomor_rekam_medis" class="col-sm-2 col-form-label">No. Rekam Medis</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomor_rekam_medis" value="<?php echo set_value('nomor_rekam_medis'); ?>">
                                    <?= form_error('nomor_rekam_medis', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_lengkap_pasien" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_lengkap_pasien" value="<?php echo set_value('nama_lengkap_pasien'); ?>">
                                    <?= form_error('nama_lengkap_pasien', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat dan Tanggal Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>">
                                    <?= form_error('tempat_lahir', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>">
                                    <?= form_error('tanggal_lahir', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Kartu Identitas</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kartu_identitas" id="gridRadios1" value="KTP" <?php echo set_radio('kartu_identitas', 'KTP'); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            KTP
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kartu_identitas" id="gridRadios2" value="SIM" <?php echo set_radio('kartu_identitas', 'SIM'); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            SIM
                                        </label>
                                    </div>
                                    <?= form_error('kartu_identitas', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label for="nomor_kartu_identitas" class="col-sm-2 col-form-label">Nomor Kartu Identitas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomor_kartu_identitas" value="<?php echo set_value('nomor_kartu_identitas'); ?>">
                                    <?= form_error('nomor_kartu_identitas', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios1" value="Laki-laki" <?php echo set_radio('jenis_kelamin', 'Laki-laki'); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios2" value="Perempuan" <?php echo set_radio('jenis_kelamin', 'Perempuan'); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                    <?= form_error('jenis_kelamin', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pekerjaan" value="<?php echo set_value('pekerjaan'); ?>">
                                    <?= form_error('pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Warga negara</label>
                                <div class="col-sm-10">
                                    <select id="wni" class="form-select" aria-label="Default select example" name="warga_negara">
                                        <option value="" selected>Pilih Warga Negara</option>
                                        <option value="Warga Negara Indonesia" <?php echo set_select('warga_negara', 'Warga Negara Indonesia'); ?>>Warga Negara Indonesia</option>
                                        <option value="Warga Negara Asing">Warga Negara Asing</option>
                                    </select>
                                    <?= form_error('warga_negara', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input id="wna" type="text" placeholder="Masukan nama negara" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Suku</label>
                                <div class="col-sm-10">
                                    <select id="suku" class="form-select" aria-label="Default select example" name="suku">
                                        <option value="" selected>Pilih Suku</option>
                                        <option value="Suku Ambon" <?php echo set_select('suku', 'Suku Ambon'); ?>>Suku Ambon</option>
                                        <option value="Suku Jawa" <?php echo set_select('suku', 'Suku Jawa'); ?>>Suku Jawa</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?= form_error('suku', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input id="suku_lainnya" type="text" placeholder="Masukan nama suku" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat_lengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat_lengkap" style="height: 100px"><?php echo set_value('alamat_lengkap'); ?></textarea>
                                    <?= form_error('alamat_lengkap', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>

                                    <div class="row mt-1">
                                        <div class="col-sm-1 mt-1">
                                            <label for="rt" class="col-form-label">RT</label>
                                            <input type="text" id="rt" name="rt" class="form-control" value="<?= set_value('rt') ?> ">
                                        </div>
                                        <div class="col-sm-1 mt-1">
                                            <label for="rw" class="col-form-label">RW</label>
                                            <input type="text" id="rw" name="rw" class="form-control" value="<?= set_value('rw') ?> ">
                                        </div>
                                        <div class="col-sm-5 mt-1">
                                            <label for="kelurahan" class=" col-form-label">Kelurahan</label>
                                            <input type="text" id="kelurahan" name="kelurahan" class="form-control" value="<?= set_value('kelurahan') ?> ">
                                        </div>
                                        <div class="col-sm-5 mt-1">
                                            <label for="kecamatan" class="col-form-label">Kecamatan</label>
                                            <input type="text" id="kecamatan" name="kecamatan" class="form-control" value="<?= set_value('kecamatan') ?> ">
                                        </div>
                                        <div class="col-sm-6 mt-1">
                                            <label for="kabupaten" class="col-form-label">Kabupaten</label>
                                            <input type="text" id="kabupaten" name="kabupaten" class="form-control" value="<?= set_value('kabupaten') ?> ">
                                        </div>
                                        <div class="col-sm-6 mt-1">
                                            <label for="provinsi" class="col-form-label">Provinsi</label>
                                            <input type="text" id="provinsi" name="provinsi" class="form-control" value="<?= set_value('provinsi') ?> ">
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
                                <label class="col-sm-2 col-form-label">Status Perkawinan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="status_perkawinan">
                                        <option value="" selected>Pilih Status Perkawinan</option>
                                        <option value="Menikah" <?php echo set_select('status_perkawinan', 'Menikah'); ?>>Menikah</option>
                                        <option value="Belum Menikah" <?php echo set_select('status_perkawinan', 'Belum Menikah'); ?>>Belum Menikah</option>
                                        <option value="Janda / Duda" <?php echo set_select('status_perkawinan', 'Janda / Duda'); ?>>Janda / Duda</option>
                                    </select>
                                    <?= form_error('status_perkawinan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="agama">
                                        <option value="" selected>Pilih Agama</option>
                                        <option value="Islam" <?php echo set_select('agama', 'Islam'); ?>>Islam</option>
                                        <option value="Khatolik" <?php echo set_select('agama', 'Khatolik'); ?>>Khatolik</option>
                                        <option value="Kristen" <?php echo set_select('agama', 'Kristen'); ?>>Kristen</option>
                                        <option value="Hindu" <?php echo set_select('agama', 'Hindu'); ?>>Hindu</option>
                                        <option value="Budha" <?php echo set_select('agama', 'Budha'); ?>>Budha</option>
                                    </select>
                                    <?= form_error('agama', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Bahasa yang digunakan</label>
                                <div class="col-sm-10">
                                    <select id="bahasa" class="form-select" aria-label="Default select example" name="bahasa">
                                        <option value="" selected>Pilih bahasa</option>
                                        <option value="Bahasa Indonesia" <?php echo set_select('bahasa', 'Bahasa Indonesia'); ?>>Bahasa Indonesia</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?= form_error('bahasa', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input id="bahasa_lainnya" type="text" placeholder="Masukan bahasa lainnya" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Pendidikan</label>
                                <div class="col-sm-10">
                                    <select id="pendidikan" class="form-select" aria-label="Default select example" name="pendidikan">
                                        <option value="" selected>Pilih Pendidikan</option>
                                        <option value="SD" <?php echo set_select('pendidikan', 'SD'); ?>>SD</option>
                                        <option value="SMP" <?php echo set_select('pendidikan', 'SMP'); ?>>SMP</option>
                                        <option value="SMA" <?php echo set_select('pendidikan', 'SMA'); ?>>SMA</option>
                                        <option value="D1/D2/D3" <?php echo set_select('pendidikan', 'D1/D2/D3'); ?>>D1/D2/D3</option>
                                        <option value="S1" <?php echo set_select('pendidikan', 'S1'); ?>>S1</option>
                                        <option value="S2" <?php echo set_select('pendidikan', 'S2'); ?>>S2</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?= form_error('pendidikan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input id="pendidikan_lainnya" type="text" placeholder="Masukan pendidikan lainnya" class="form-control mt-3" style="display: none;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomor_hp" value="<?php echo set_value('nomor_hp'); ?>">
                                    <?= form_error('nomor_hp', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jenis Pembayaran</label>
                                <div class="col-sm-10">
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
                                            <option value="<?= $p->id_poliklinik ?>" <?php echo set_select('id_poliklinik', $p->id_poliklinik); ?>><?= $p->nama_klinik ?></option>
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
    handleLainnya("wni", "wna", "Warga Negara Asing");
    handleLainnya("suku", "suku_lainnya", "Lainnya");
    handleLainnya("bahasa", "bahasa_lainnya", "Lainnya");
    handleLainnya("pendidikan", "pendidikan_lainnya", "Lainnya");
    handleLainnya("jenis_pembayaran", "jenis_pembayaran_lainnya", "Lainnya");
    handleLainnya("hubungan", "hubungan_lainnya", "Lainnya");
</script>