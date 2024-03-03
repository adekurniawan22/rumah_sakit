<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Cetak Laporan Obat</title>
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
        <h1 class="text-center mt-3">Laporan Obat (<?php echo date('Y'); ?>)</h1>
        <table id="" class="table my-4">
            <thead>
                <tr>
                    <th>Nama Obat</th>
                    <!-- <th>Stok</th> -->
                    <?php
                    // Tampilkan kolom bulan dari Januari hingga bulan sekarang dengan nama bulan dalam bahasa Indonesia
                    for ($bulan = 1; $bulan <= $bulan_sekarang; $bulan++) {
                        echo "<th class='text-center'>" . $nama_bulan_indonesia[$bulan - 1] . "</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_pengembalian_obat as $obat_yang_diambil => $obat) { ?>
                    <tr>
                        <td><?php echo $obat['nama_obat']; ?></td>
                        <!-- <td><?php echo $obat['stok_obat']; ?></td> -->
                        <?php
                        for ($bulan = 1; $bulan <= date('m'); $bulan++) {
                            if (isset($obat['jumlah_pengembalian_obat'][$bulan])) {
                                echo "<td class='text-center'>" . $obat['jumlah_pengembalian_obat'][$bulan] . "</td>";
                            } else {
                                echo "<td class='text-center'>0</td>"; // Jika tidak ada data jumlah pengembalian obat untuk bulan ini, isi dengan 0
                            }
                        }
                        ?>
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