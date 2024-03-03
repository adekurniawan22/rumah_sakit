<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Cetak Laporan Pasien</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <!-- Favicons -->
    <link href="<?php echo base_url() ?>assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/img/logo.png" rel="apple-touch-icon">

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
    <div class="mx-5">
        <h1 class="text-center mt-3">Laporan Pasien (<?php echo date('Y'); ?>)</h1>
        <table id="" class="table my-4">
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
</body>
<!-- Vendor JS Files -->
<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/quill/quill.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url() ?>assets/bootstrap/assets/js/main.js"></script>
<script>
    window.print()
</script>
</body>

</html>