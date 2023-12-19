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
    <div style="border: 1px solid black; padding: 30px;">
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
                <td style="vertical-align: top;" style="width: 350px;">Nomor Rekam Medis</td>
                <td style="vertical-align: top;" style="width: 20px;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->nomor_rekam_medis ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Poliklinik</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->nama_poliklinik ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Nama Pasien</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->nama_lengkap_pasien ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Tempat dan Tanggal Lahir</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->tempat_lahir ?>, <?= $pendaftaran[0]->tanggal_lahir ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Kartu Identitas</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->kartu_identitas ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Nomor Kartu Identitas</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->nomor_kartu_identitas ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Jenis Kelamin</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->jenis_kelamin ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Pekerjaan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->pekerjaan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Warga Negara</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->warga_negara ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Suku</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->suku ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Alamat Lengkap</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->alamat_lengkap ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Status Perkawinan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->status_perkawinan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Agama</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->agama ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Bahasa</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->bahasa ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Pendidikan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->pendidikan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Nomor HP</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->nomor_hp ?></td>
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
                <td style="vertical-align: top;">Jenis Pembayaran</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->jenis_pembayaran ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Penanggung Jawab</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->penanggung_jawab ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Nama Penanggung Jawab</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->nama_penanggung_jawab ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Hubungan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->hubungan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Alamat Penanggung Jawab</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->alamat_penanggung_jawab ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Nomor HP Penanggung Jawab</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pendaftaran[0]->nomor_hp_penanggung_jawab ?></td>
            </tr>

        </table>
    </div>

    <div style="margin-top: 1000px; border: 1px solid black; padding: 30px;">
        <div class="d-flex justify-content-end">
            <span><i>Diperiksa oleh : <?= $pemeriksaan1[0]->nama_lengkap ?></i></span><br>
        </div>

        <div class="d-flex justify-content-end">
            <span><i>Tanggal dan waktu : <?= date('d-F-Y', strtotime($pemeriksaan1[0]->waktu_pemeriksaan)) ?>, Jam <?= date('H:i', strtotime($pemeriksaan1[0]->waktu_pemeriksaan)) ?></i></span>
        </div>

        <h2 class="mt-5">Data Pemeriksaan 1</h2>

        <table class="table">
            <tr>
                <td style="vertical-align: top;">
                    <p><b>Pemeriksaan Fisik</b></p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;" style="width: 350px;">Keadaan Umum</td>
                <td style="vertical-align: top;" style="width: 20px;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->keadaan_umum ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Kesadaran</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->kesadaran ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">GCS</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->gcs ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">E</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->e ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">V</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->v ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">M</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->m ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Keluhan Umum</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->keluhan_umum ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Keluhan Lain Yang Menyertai</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->keluhan_lain ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Tanda Vital</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Tekanan Darah</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->tekanan_darah ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Nadi</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->nadi ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Temperatur</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->temperatur ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Pernapasan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->pernapasan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Nyeri</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->nyeri ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Pencetus</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->pencetus ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Kwalitas</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->kwalitas ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Lokasi</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->lokasi ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Skala</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->skala ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Durasi</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->durasi ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Konsep Diri dan Kognotif</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Pengetahuan tentang penyakit saat ini</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->pengetahuan_tentang_penyakit ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Perawatan / tindakan yang dilakukan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->perawatan_yg_dilakukan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Perasaan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->perasaan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Status Fungsional</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Aktivitas Sehari-hari</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->status_aktivitas ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Muskuloskeleta</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->muskuloskeleta ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Kekuatan Otot</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->kekuatan_otot ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Riwayat Alergi</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Alergi</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->alergi ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Status Psikologis</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Tidur Siang</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->tidur_siang ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Tidur Malam</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->tidur_malam ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Gangguan Tidur</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->gangguan_tidur ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Penerimaan kondisi saat ini</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->penerimaan_kondisi ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Kebutuhan Sosial</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Tinggal Bersama</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->tinggal_bersama ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Kebiasaan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->kebiasaan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Skrining Resiko</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Skor Humty Dumty (Anak)</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->skor_hm ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Skor Morse Fall Scale (Dewasa)</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->skor_mfs ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Skor Ontario modified stratify-Sydney</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->skor_omss ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Apakah sudah diberitahukan ke Dokter?</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->status_laporan_hasil_SR ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Gizi</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Berat Badan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->berat_badan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Tinggi Badan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->tinggi_badan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">IMT (Indeks Massa Tubuh)</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->imt ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Berdasarkan Malnutrition Screening Tool (MST)</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->skor_mst ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Riwayat Imunisasi</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Imunisasi Dasar</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->imunisasi_dasar ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Imunisasi lain</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->imunisasi_lain ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Kebutuhan Biologis</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Eliminasi</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->eliminasi ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Pola Makan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->pola_makan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Pola Minum</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->pola_minum ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">BAK</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->bak ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">BAB</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->bab ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Riwayat Tumbuh Kembang Balita</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Umur</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->umur ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Sosial</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->RTKB_sosial ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Motorik Halus</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->RTKB_motorik_halus ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Motorik Kasar</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->RTKB_motorik_kasar ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Bahasa</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->RTKB_bahasa ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Pelaksanaan Asuhan</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Analisa Masalah Keperawatan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->analisa_masalah_keperawatan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Planning</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->planning ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Implementasi Dan Evaluasi</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->implementasi_dan_evaluasi ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Edukasi</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->edukasi ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Pemulangan Pasien</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Keadaan Pasien Pulang</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->keadaan_pasien_pulang ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Berkas yang diberikan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->berkas_yang_diberikan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Info dan Edukasi yang diberikan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->info_edukasi_yang_diberikan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Pulang atas permintaan sendiri</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->status_permintaan_pulang ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Melarikan Diri / Minggat</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan1[0]->status_melarikan_diri ?></td>
            </tr>

        </table>
    </div>

    <div style="margin-top: 1000px; border: 1px solid black; padding: 30px;">
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
                <td style="vertical-align: top;" style="width: 350px;">Keluhan Umum</td>
                <td style="vertical-align: top;" style="width: 20px;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->keluhan_umum ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Riwayat Penyakit Sekarang</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->riwayat_penyakit_sekarang ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Riwayat Alergi</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->riwayat_alergi ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Riwayat Penyakit Dahulu</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->riwayat_penyakit_dahulu ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Riwayat Pengobatan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->riwayat_pengobatan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Riwayat Penyakit Keluarga</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->riwayat_penyakit_keluarga ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Pemeriksaan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->pemeriksaan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Diagnosa Utama</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->diagnosa_utama ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Diagnosa Tambahan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->diagnosa_tambahan ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Planning</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->planning ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Tindakan</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->planning ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Edukasi</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->edukasi ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Resep Obat</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->resep_obat ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;"><br></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <p><b>Rencana Pulang / Discharge Planning</b></p>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Rencana Kontrol</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->rencana_kontrol ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Pelayanan Home Care</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->pelayanan_home_care ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Kontrol Ke Poliklinik</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->kontrol_ke_poliklinik ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Penggunaan Alat Medis/Bantu</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->perlu_penggunaan_alat ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Dilakukan Pemesanan Alat</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->telah_memesan_alat ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Dirujuk Ke Komunitas Tertentu</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->dirujuk_ke_komunitas ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Dirujuk Ke Tim Terapis</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->dirujuk_ke_terapis ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Dirujuk Ke Ahli Gizi</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->dirujuk_ke_ahli_gizi ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Lain-lain</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->lain_lain ?></td>
            </tr>

            <tr>
                <td style="vertical-align: top;">Perlu Melakukan Pemeriksaan Lanjut?</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;"><?= $pemeriksaan2[0]->perlu_pemeriksaan_lanjut ?></td>
            </tr>

        </table>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>