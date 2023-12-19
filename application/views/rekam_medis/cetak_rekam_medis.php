<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="widtd=device-widtd, initial-scale=1.0" name="viewport">

    <title>Cetak Surat Rekomendasi</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!-- Favicons -->
    <link href="<?php echo base_url() ?>assets/bootstrap/assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/bootstrap/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url() ?>assets/bootstrap/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div>
        <div class="d-flex justify-content-end">
            <span><i>Didaftarkan oleh : <?= $pendaftaran[0]->nama_lengkap ?></i></span><br>
        </div>

        <div class="d-flex justify-content-end">
            <span><i>Tanggal dan waktu : <?= date('d-F-Y', strtotime($pendaftaran[0]->waktu_pendaftaran)) ?>, Jam <?= date('H:i', strtotime($pendaftaran[0]->waktu_pendaftaran)) ?></i></span>
        </div>

        <h2 class="mt-5">Data Pendaftaran</h2>

        <table class="table">
            <tr>
                <td>
                    <p><b>Pasien</b></p>
                </td>
            </tr>
            <tr>
                <td style="width: 350px;">Nomor Rekam Medis</td>
                <td style="width: 20px;">:</td>
                <td><?= $pendaftaran[0]->nomor_rekam_medis ?></td>
            </tr>

            <tr>
                <td>Poliklinik</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->nama_poliklinik ?></td>
            </tr>

            <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->nama_lengkap_pasien ?></td>
            </tr>

            <tr>
                <td>Tempat dan Tanggal Lahir</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->tempat_lahir ?>, <?= $pendaftaran[0]->tanggal_lahir ?></td>
            </tr>

            <tr>
                <td>Kartu Identitas</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->kartu_identitas ?></td>
            </tr>

            <tr>
                <td>Nomor Kartu Identitas</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->nomor_kartu_identitas ?></td>
            </tr>

            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->jenis_kelamin ?></td>
            </tr>

            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->pekerjaan ?></td>
            </tr>

            <tr>
                <td>Warga Negara</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->warga_negara ?></td>
            </tr>

            <tr>
                <td>Suku</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->suku ?></td>
            </tr>

            <tr>
                <td>Alamat Lengkap</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->alamat_lengkap ?></td>
            </tr>

            <tr>
                <td>Status Perkawinan</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->status_perkawinan ?></td>
            </tr>

            <tr>
                <td>Agama</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->agama ?></td>
            </tr>

            <tr>
                <td>Bahasa</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->bahasa ?></td>
            </tr>

            <tr>
                <td>Pendidikan</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->pendidikan ?></td>
            </tr>

            <tr>
                <td>Nomor HP</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->nomor_hp ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>
                    <p><b>Penanggung Jawab</b></p>
                </td>
            </tr>

            <tr>
                <td>Jenis Pembayaran</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->jenis_pembayaran ?></td>
            </tr>

            <tr>
                <td>Penanggung Jawab</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->penanggung_jawab ?></td>
            </tr>

            <tr>
                <td>Nama Penanggung Jawab</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->nama_penanggung_jawab ?></td>
            </tr>

            <tr>
                <td>Hubungan</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->hubungan ?></td>
            </tr>

            <tr>
                <td>Alamat Penanggung Jawab</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->alamat_penanggung_jawab ?></td>
            </tr>

            <tr>
                <td>Nomor HP Penanggung Jawab</td>
                <td>:</td>
                <td><?= $pendaftaran[0]->nomor_hp_penanggung_jawab ?></td>
            </tr>

        </table>
    </div>

    <div style="margin-top: 1000px;">
        <div class="d-flex justify-content-end">
            <span><i>Diperiksa oleh : <?= $pemeriksaan1[0]->nama_lengkap ?></i></span><br>
        </div>

        <div class="d-flex justify-content-end">
            <span><i>Tanggal dan waktu : <?= date('d-F-Y', strtotime($pemeriksaan1[0]->waktu_pemeriksaan)) ?>, Jam <?= date('H:i', strtotime($pemeriksaan1[0]->waktu_pemeriksaan)) ?></i></span>
        </div>

        <h2 class="mt-5">Data Pemeriksaan 1</h2>

        <table class="table">
            <tr>
                <td>
                    <p><b>Pemeriksaan Fisik</b></p>
                </td>
            </tr>
            <tr>
                <td style="width: 350px;">Keadaan Umum</td>
                <td style="width: 20px;">:</td>
                <td><?= $pemeriksaan1[0]->keadaan_umum ?></td>
            </tr>

            <tr>
                <td>Kesadaran</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->kesadaran ?></td>
            </tr>

            <tr>
                <td>GCS</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->gcs ?></td>
            </tr>

            <tr>
                <td>E</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->e ?></td>
            </tr>

            <tr>
                <td>V</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->v ?></td>
            </tr>

            <tr>
                <td>M</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->m ?></td>
            </tr>

            <tr>
                <td>Keluhan Umum</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->keluhan_umum ?></td>
            </tr>

            <tr>
                <td>Keluhan Lain Yang Menyertai</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->keluhan_lain ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Tanda Vital</b></p>
                </td>
            </tr>

            <tr>
                <td>Tekanan Darah</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->tekanan_darah ?></td>
            </tr>

            <tr>
                <td>Nadi</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->nadi ?></td>
            </tr>

            <tr>
                <td>Temperatur</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->temperatur ?></td>
            </tr>

            <tr>
                <td>Pernapasan</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->pernapasan ?></td>
            </tr>

            <tr>
                <td>Nyeri</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->nyeri ?></td>
            </tr>

            <tr>
                <td>Pencetus</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->pencetus ?></td>
            </tr>

            <tr>
                <td>Kwalitas</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->kwalitas ?></td>
            </tr>

            <tr>
                <td>Lokasi</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->lokasi ?></td>
            </tr>

            <tr>
                <td>Skala</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->skala ?></td>
            </tr>

            <tr>
                <td>Durasi</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->durasi ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Konsep Diri dan Kognotif</b></p>
                </td>
            </tr>

            <tr>
                <td>Pengetahuan tentang penyakit saat ini</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->pengetahuan_tentang_penyakit ?></td>
            </tr>

            <tr>
                <td>Perawatan / tindakan yang dilakukan</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->perawatan_yg_dilakukan ?></td>
            </tr>

            <tr>
                <td>Perasaan</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->perasaan ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Status Fungsional</b></p>
                </td>
            </tr>

            <tr>
                <td>Aktivitas Sehari-hari</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->status_aktivitas ?></td>
            </tr>

            <tr>
                <td>Muskuloskeleta</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->muskuloskeleta ?></td>
            </tr>

            <tr>
                <td>Kekuatan Otot</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->kekuatan_otot ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Riwayat Alergi</b></p>
                </td>
            </tr>

            <tr>
                <td>Alergi</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->alergi ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Status Psikologis</b></p>
                </td>
            </tr>

            <tr>
                <td>Tidur Siang</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->tidur_siang ?></td>
            </tr>

            <tr>
                <td>Tidur Malam</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->tidur_malam ?></td>
            </tr>

            <tr>
                <td>Gangguan Tidur</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->gangguan_tidur ?></td>
            </tr>

            <tr>
                <td>Penerimaan kondisi saat ini</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->penerimaan_kondisi ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Kebutuhan Sosial</b></p>
                </td>
            </tr>

            <tr>
                <td>Tinggal Bersama</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->tinggal_bersama ?></td>
            </tr>

            <tr>
                <td>Kebiasaan</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->kebiasaan ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Skrining Resiko</b></p>
                </td>
            </tr>

            <tr>
                <td>Skor Humty Dumty (Anak)</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->skor_hm ?></td>
            </tr>

            <tr>
                <td>Skor Morse Fall Scale (Dewasa)</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->skor_mfs ?></td>
            </tr>

            <tr>
                <td>Skor Ontario modified stratify-Sydney</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->skor_omss ?></td>
            </tr>

            <tr>
                <td>Apakah sudah diberitahukan ke Dokter?</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->status_laporan_hasil_SR ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Gizi</b></p>
                </td>
            </tr>

            <tr>
                <td>Berat Badan</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->berat_badan ?></td>
            </tr>

            <tr>
                <td>Tinggi Badan</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->tinggi_badan ?></td>
            </tr>

            <tr>
                <td>IMT (Indeks Massa Tubuh)</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->imt ?></td>
            </tr>

            <tr>
                <td>Berdasarkan Malnutrition Screening Tool (MST)</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->skor_mst ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Riwayat Imunisasi</b></p>
                </td>
            </tr>

            <tr>
                <td>Imunisasi Dasar</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->imunisasi_dasar ?></td>
            </tr>

            <tr>
                <td>Imunisasi lain</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->imunisasi_lain ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Kebutuhan Biologis</b></p>
                </td>
            </tr>

            <tr>
                <td>Eliminasi</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->eliminasi ?></td>
            </tr>

            <tr>
                <td>Pola Makan</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->pola_makan ?></td>
            </tr>

            <tr>
                <td>Pola Minum</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->pola_minum ?></td>
            </tr>

            <tr>
                <td>BAK</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->bak ?></td>
            </tr>

            <tr>
                <td>BAB</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->bab ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Riwayat Tumbuh Kembang Balita</b></p>
                </td>
            </tr>

            <tr>
                <td>Umur</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->umur ?></td>
            </tr>

            <tr>
                <td>Sosial</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->RTKB_sosial ?></td>
            </tr>

            <tr>
                <td>Motorik Halus</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->RTKB_motorik_halus ?></td>
            </tr>

            <tr>
                <td>Motorik Kasar</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->RTKB_motorik_kasar ?></td>
            </tr>

            <tr>
                <td>Bahasa</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->RTKB_bahasa ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Pelaksanaan Asuhan</b></p>
                </td>
            </tr>

            <tr>
                <td>Analisa Masalah Keperawatan</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->analisa_masalah_keperawatan ?></td>
            </tr>

            <tr>
                <td>Planning</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->planning ?></td>
            </tr>

            <tr>
                <td>Implementasi Dan Evaluasi</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->implementasi_dan_evaluasi ?></td>
            </tr>

            <tr>
                <td>Edukasi</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->edukasi ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Pemulangan Pasien</b></p>
                </td>
            </tr>

            <tr>
                <td>Keadaan Pasien Pulang</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->keadaan_pasien_pulang ?></td>
            </tr>

            <tr>
                <td>Berkas yang diberikan</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->berkas_yang_diberikan ?></td>
            </tr>

            <tr>
                <td>Info dan Edukasi yang diberikan</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->info_edukasi_yang_diberikan ?></td>
            </tr>

            <tr>
                <td>Pulang atas permintaan sendiri</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->status_permintaan_pulang ?></td>
            </tr>

            <tr>
                <td>Melarikan Diri / Minggat</td>
                <td>:</td>
                <td><?= $pemeriksaan1[0]->status_melarikan_diri ?></td>
            </tr>

        </table>
    </div>

    <div style="margin-top: 1000px;">
        <div class="d-flex justify-content-end">
            <span><i>Diperiksa oleh : <?= $pemeriksaan2[0]->nama_lengkap ?></i></span><br>
        </div>

        <div class="d-flex justify-content-end">
            <span><i>Tanggal dan waktu : <?= date('d-F-Y', strtotime($pemeriksaan2[0]->waktu_pemeriksaan2)) ?>, Jam <?= date('H:i', strtotime($pemeriksaan2[0]->waktu_pemeriksaan2)) ?></i></span>
        </div>

        <h2 class="mt-5">Data Pemeriksaan 2</h2>
        <span>(Diperiksa oleh : <?= $pemeriksaan2[0]->nama_lengkap ?>)</span>

        <table class="table">

            <tr>
                <td style="width: 350px;">Keluhan Umum</td>
                <td style="width: 20px;">:</td>
                <td><?= $pemeriksaan2[0]->keluhan_umum ?></td>
            </tr>

            <tr>
                <td>Riwayat Penyakit Sekarang</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->riwayat_penyakit_sekarang ?></td>
            </tr>

            <tr>
                <td>Riwayat Alergi</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->riwayat_alergi ?></td>
            </tr>

            <tr>
                <td>Riwayat Penyakit Dahulu</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->riwayat_penyakit_dahulu ?></td>
            </tr>

            <tr>
                <td>Riwayat Pengobatan</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->riwayat_pengobatan ?></td>
            </tr>

            <tr>
                <td>Riwayat Penyakit Keluarga</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->riwayat_penyakit_keluarga ?></td>
            </tr>

            <tr>
                <td>Pemeriksaan</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->pemeriksaan ?></td>
            </tr>

            <tr>
                <td>Diagnosa Utama</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->diagnosa_utama ?></td>
            </tr>

            <tr>
                <td>Diagnosa Tambahan</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->diagnosa_tambahan ?></td>
            </tr>

            <tr>
                <td>Planning</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->planning ?></td>
            </tr>

            <tr>
                <td>Tindakan</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->planning ?></td>
            </tr>

            <tr>
                <td>Edukasi</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->edukasi ?></td>
            </tr>

            <tr>
                <td>Resep Obat</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->resep_obat ?></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td>
                    <p><b>Rencana Pulang / Discharge Planning</b></p>
                </td>
            </tr>

            <tr>
                <td>Rencana Kontrol</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->rencana_kontrol ?></td>
            </tr>

            <tr>
                <td>Pelayanan Home Care</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->pelayanan_home_care ?></td>
            </tr>

            <tr>
                <td>Kontrol Ke Poliklinik</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->kontrol_ke_poliklinik ?></td>
            </tr>

            <tr>
                <td>Penggunaan Alat Medis/Bantu</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->perlu_penggunaan_alat ?></td>
            </tr>

            <tr>
                <td>Dilakukan Pemesanan Alat</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->telah_memesan_alat ?></td>
            </tr>

            <tr>
                <td>Dirujuk Ke Komunitas Tertentu</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->dirujuk_ke_komunitas ?></td>
            </tr>

            <tr>
                <td>Dirujuk Ke Tim Terapis</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->dirujuk_ke_terapis ?></td>
            </tr>

            <tr>
                <td>Dirujuk Ke Ahli Gizi</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->dirujuk_ke_ahli_gizi ?></td>
            </tr>

            <tr>
                <td>Lain-lain</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->lain_lain ?></td>
            </tr>

            <tr>
                <td>Perlu Melakukan Pemeriksaan Lanjut?</td>
                <td>:</td>
                <td><?= $pemeriksaan2[0]->perlu_pemeriksaan_lanjut ?></td>
            </tr>

        </table>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>