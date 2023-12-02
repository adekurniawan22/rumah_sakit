<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard my-3">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($result as $count) : ?>
                        <div class="col-xxl-4 col-md-6">
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

</main><!-- End #main -->