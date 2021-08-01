<?= $this->extend('layout/global'); ?>

<?= $this->section('content'); ?>
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka);
    return $hasil_rupiah;
} ?>
<!-- Page Content -->
<div class="container mobile-margin mt-4">

    <div class="row">


        <!-- /.col-lg-3 -->

        <div class="col-lg-12">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">

                    <?php foreach ($banners as $banner) : ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="<?= ($banner['ordinal'] == '1') ? 'active' : ''; ?>"></li>
                    <?php endforeach; ?>
                </ol>
                <div class="carousel-inner" role="listbox">

                    <?php foreach ($banners as $banner) : ?>
                        <div class="carousel-item <?= ($banner['ordinal'] == '1') ? 'active' : ''; ?>">
                            <img class="d-block img-fluid img-landing" src="/images/landing/<?= $banner['url']; ?>" style="object-fit: cover;" alt="First slide">
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row mt-4 mb-3">
                <div class="col-5">
                    <hr>
                </div>
                <div class="col-2 text-center">
                    <h5>Batik Terbaru</h5>
                </div>
                <div class="col-5">
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center">
                <?php foreach ($newBatiks as $newBatik) : ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <a href="/detail/<?= $newBatik['slug']; ?>"><img class="card-img-top img-item" src="/images/batik/<?= $newBatik['image']; ?>" alt=""></a>
                            <img class="popnew-icon" src="/assets/images/new.png" alt="">
                            <div class="card-body card-body-item text-center">
                                <h6 class="card-title title-item">
                                    <a href="/detail/<?= $newBatik['slug']; ?>"><?= $newBatik['name']; ?></a>
                                </h6>
                                <h5 class="price"><?= rupiah($newBatik['harga_jual']); ?></h5>
                                <small class="star">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="col-md-12 text-center">
                    <a href="/more/new" class="btn btn-secondary">Lihat Batik Terbaru Lainnya</a>
                </div>
            </div>

            <div class="row mt-4 mb-3">
                <div class="col-5">
                    <hr>
                </div>
                <div class="col-2 text-center">
                    <h5>Batik Terlaris</h5>
                </div>
                <div class="col-5">
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center">
                <?php foreach ($popularsBatik as $popularBatik) : ?>
                    <a href="/detail/<?= $popularBatik['slug']; ?>">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <a href="/detail/<?= $popularBatik['slug']; ?>"><img class="card-img-top img-item" src="/images/batik/<?= $popularBatik['image']; ?>" alt=""></a>
                                <img class="popnew-icon" src="/assets/images/popular.png" alt="">
                                <div class="card-body card-body-item text-center">
                                    <h6 class="card-title title-item">
                                        <a href="#"><?= $popularBatik['name']; ?></a>
                                    </h6>
                                    <h5 class="price"><?= rupiah($popularBatik['harga_jual']); ?></h5>
                                    <small class="star">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <div class="col-md-12 text-center">
                    <a href="/more/popular" class="btn btn-secondary">Lihat Batik Terlaris lainnya</a>
                </div>
            </div>


            <div class="row mt-4 mb-3">
                <div class="col-5">
                    <hr>
                </div>
                <div class="col-2 text-center">
                    <h5>Daftar Batik</h5>
                </div>
                <div class="col-5">
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center">


                <?php foreach ($otherBatiks as $otherBatik) : ?>
                    <a href="/detail/<?= $otherBatik['slug']; ?>">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <a href="#"><img class="card-img-top img-item" src="/images/batik/<?= $otherBatik['image']; ?>" alt=""></a>
                                <?php if ($otherBatik['populer'] == 1) : ?>
                                    <img class="popnew-icon" src="/assets/images/popular.png" alt="">
                                <?php endif; ?>

                                <div class="card-body card-body-item text-center">
                                    <h6 class="card-title title-item">
                                        <a href="/detail/<?= $otherBatik['slug']; ?>"><?= $otherBatik['name']; ?></a>
                                    </h6>
                                    <h5 class="price"><?= rupiah($otherBatik['harga_jual']); ?></h5>
                                    <small class="star">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <div class="col-md-12 text-center mb-2">
                    <a href="/more/other" class="btn btn-secondary">Lihat Semua Daftar Batik</a>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


<?= $this->endSection(); ?>