<main id="main" class="main">
    <?php
    $nama_bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    $bulan_sekarang = $nama_bulan[date('n')];

    ?>
    <div class="pagetitle mt-4 mb-4">
        <h1 class="ms-1">Pendaftaran Pasien <em>(bulan <?php echo $bulan_sekarang; ?>)</em></h1>
    </div>


    <section class="section dashboard my-2">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($pendaftaran as $count) : ?>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title"><?= $count->jenis_pembayaran ?></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <?php if ($count->jenis_pembayaran == "Bayar") : ?>
                                                <i class="bi bi-wallet"></i>
                                            <?php else : ?>
                                                <i class="bi bi-person-vcard"></i>
                                            <?php endif ?>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?= $count->total ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->
                    <?php endforeach ?>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

    <hr>

    <div class="pagetitle mb-4 ">
        <h1 class="ms-1">Jumlah Pegawai (<?= count($pegawai) ?>)</h1>
    </div>

    <section class="section dashboard my-2">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($pegawai as $count) : ?>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title"><?= $count->nama_role ?></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?= $count->jumlah_pegawai ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->
                    <?php endforeach ?>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

    <hr>

    <div class="pagetitle mt-4 mb-4">
        <h1 class="ms-1">Jumlah Poliklinik (<?= count($poliklinik) ?>)</h1>
    </div>

    <section class="section dashboard my-2">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($poliklinik as $count) : ?>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title mb-0 pb-0"><?= $count->nama_poliklinik ?></h5>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->
                    <?php endforeach ?>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>



</main>