<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="widtd=device-widtd, initial-scale=1.0" name="viewport">

    <title>Cetak Nota Pengambilan Obat</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="<?php echo base_url() ?>assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/img/logo.png" rel="apple-touch-icon">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            max-width: 700px;
            width: 75%;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.5);
        }

        .card.border-dashed {
            border-style: dashed;
            border-color: #333;
            border-width: 2px;
            border-radius: 0;
        }
    </style>
</head>

<body>
    <div class="nota-container">
        <!-- Your content goes here -->
        <div class="row">
            <div class="col-12">
                <h3 class="text-center mb-3">Nota Pengambilan Obat</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Nama Pasien : <strong><?= $pengambilan_obat[0]->nama_lengkap_pasien  ?></strong></p>
                        <p class="card-text">Nama Poliklinik : <strong><?= $pengambilan_obat[0]->nama_poliklinik  ?></strong></p>
                        <p class="card-text">Keterangan : <strong><?= $pengambilan_obat[0]->keterangan_pengambilan_obat  ?></strong></p>

                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        ?>
                        <div class="d-flex justify-content-end" style="margin-top: 50px;"><?= date('d-F-Y') ?></div><br>
                        <div class="d-flex justify-content-end" style="margin-top: -20px;">Jam <?= date('H:i') ?></div><br>
                        <div class="d-flex justify-content-end" style="margin-top: 60px;">RSUD Dr. H. ISHAK UMARELLA</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <?php
            $this->db->where('id_pendaftaran', $pengambilan_obat[0]->id_pendaftaran);
            $query = $this->db->get('t_pengambilan_obat')->result();
            ?>
            <?php foreach ($query as $q) : ?>
                <?php
                $this->db->where('id_obat', $q->obat_yang_diambil);
                $obat = $this->db->get('t_obat')->row();
                ?>
                <div class="col-6">
                    <div class="card border-dashed">
                        <div class="card-body">
                            <p class="m-3">Nama Obat: <?= $obat->nama_obat ?></p>
                            <p class="m-3">Jumlah Obat: <?= $q->jumlah ?> pcs</p>
                            <p class="m-3">Catatan Obat: <?= $q->catatan ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
    window.print()
</script>

</html>