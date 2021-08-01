<?= $this->extend('layout/global'); ?>

<?= $this->section('content'); ?>
<?php
function rupiah($angka)
{


    return  "Rp " . number_format($angka);
} ?>

<!-- Page Content -->
<div class="container mobile-margin frontend" style="margin-top: 3rem!important">

    <div class="row mt-3 justify-content-center">
        <?php foreach ($batiks as $batik) : ?>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <a href="/detail/<?= $batik['slug']; ?>"><img class="card-img-top img-item" src="/images/batik/<?= $batik['image']; ?>" alt=""></a>
                    <?php if ($batik['populer'] == 1) : ?>
                        <img class="popnew-icon" src="/assets/images/popular.png" alt="">
                    <?php endif; ?>
                    <div class="card-body card-body-item text-center">
                        <h6 class="card-title title-item">
                            <a href="/detail/<?= $batik['slug']; ?>"><?= $batik['name']; ?></a>
                        </h6>
                        <h5 class="price"><?= rupiah($batik['harga_jual']); ?></h5>
                        <small class="star">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        <?php if (count($batiks) == 0) : ?>
            <div class="col-md-12 text-center mt-5">
                <h3>Batik yang anda cari belum tersedia</h3>
                <h3><a href="<?= $whatsapp; ?>?text=Bagaimana%20cara%20membeli%20batik%20di%20Batik%20ID%20?%20"><strong>Klik Disini!</strong></a> Untuk menanyakan ketersediaan batik pada Admin</h3>
            </div>

        <?php endif; ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?= $this->endSection(); ?>