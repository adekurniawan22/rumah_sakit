<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Live Antrian</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Live Antrian <br>
            <?php if (!empty($nama_poliklinik->nama_poliklinik)) { ?>
                <?= $nama_poliklinik->nama_poliklinik ?>
            <?php } else { ?>
                Error
            <?php } ?>
        </h1>

        <?php if ($nomor_antri < $nomor_antri_sekarang->nomor_antri_sekarang) { ?>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3>Nomor Antri</h3>
                        </div>
                        <div class="card-body">
                            <h1 id="nomor_antri"><?= $nomor_antri  ?> <br>
                                <p style="font-size: 25px; color:red">(nomor antrian anda sudah lewat)</p>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6 offset-md-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3>Nomor Antri Sekarang</h3>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($nomor_antri_sekarang->nomor_antri_sekarang)) { ?>
                                <h1 id="nomor_antri_sekarang"><?= $nomor_antri_sekarang->nomor_antri_sekarang ?></h1>
                            <?php } else if ($nomor_antri_sekarang->nomor_antri_sekarang == 0) { ?>
                                <h1 id="nomor_antri">0</h1>
                            <?php } else { ?>
                                <h1 id="nomor_antri">Error</h1>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row mt-4">
                <div class="col-md-6 offset-md-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3>Nomor Antri Pasien</h3>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($nomor_antri)) { ?>
                                <h1 id="nomor_antri"><?= $nomor_antri ?></h1>
                            <?php } else { ?>
                                <h1 id="nomor_antri">Error</h1>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 offset-md-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3>Nomor Antri Sekarang</h3>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($nomor_antri_sekarang->nomor_antri_sekarang)) { ?>
                                <h1 id="nomor_antri_sekarang"><?= $nomor_antri_sekarang->nomor_antri_sekarang ?></h1>
                            <?php } else if ($nomor_antri_sekarang->nomor_antri_sekarang == 0) { ?>
                                <h1 id="nomor_antri">0</h1>
                            <?php } else { ?>
                                <h1 id="nomor_antri">Error</h1>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <!-- Tambahkan script JavaScript Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>