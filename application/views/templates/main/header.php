<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?></title>
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
    <style>
        .dataTables_length select {
            color: #333;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding-right: 10px;
        }

        .dataTables_wrapper .dataTables_length {
            margin-bottom: 10px;
            /* Mengatur jarak antara "Show [n] entries" dengan tabel */
        }

        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 10px;
            /* Mengatur jarak antara pencarian dengan tabel */
        }

        .dataTables_info {
            margin-top: 30px !important;
        }

        .dataTables_paginate {
            margin-top: 30px !important;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= base_url('auth/login') ?>" class="logo d-flex align-items-center">
                <img src="<?php echo base_url() ?>assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">RSUD</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

    </header><!-- End Header -->