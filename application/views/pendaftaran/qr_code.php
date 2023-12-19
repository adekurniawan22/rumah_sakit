<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="widtd=device-widtd, initial-scale=1.0" name="viewport">

    <title>Cetak Nomor Antri</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="<?php echo base_url() ?>assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/img/logo.png" rel="apple-touch-icon">
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
    <style>
        body {
            margin: 0;
            padding: 0;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
        }

        .nota-container {
            background-image: url('<?php echo base_url() ?>assets/img/cover/cover.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="nota-container">
        <!-- Your content goes here -->
        <h3 class="text-center mb-4">QR Code Nomor Antri</h3>
        <pre>
        <img src="<?= base_url('assets/media/qrcode/' . $nama_file); ?>" alt="QR Code" />
        </pre>
        <h4 class="text-center">Nomor antri anda <?= $nomor_antri ?></h4>

        <!-- Add more content as needed -->
    </div>
</body>
<script>
    window.print()
</script>

</html>