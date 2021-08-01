<?= $this->extend('layout/global'); ?>

<?= $this->section('content'); ?>
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka);
    return $hasil_rupiah;
} ?>
<!-- Page Content -->
<div class="container mobile-margin frontend" style="margin-top: 3rem!important">

    <div class="row mt-3 mb-3">

        <!-- ARTIKEL -->
        <div class="col-md-8">
            <h1>
                <?= $artikel['judul'] ?>
            </h1>

            <img src="/images/artikel/<?= $artikel['image'] ?>" class="rounded float-left" alt="..." class="img-blog" style="margin-bottom: 20px; width: 100%;">
            <div>
                <?= $artikel['content'] ?>

                <p class="text-muted"><em>Sumber: <?= $artikel['sumber']; ?></em> </p>
            </div>
        </div>

        <!-- DAGANGAN -->
        <div class="col-md-4">
            <?php foreach ($batiks as $batik) : ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/images/batik/<?= $batik['image']; ?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body card-hor">
                                <h5 class="card-title" style="max-height: 50px; overflow: hidden; "><?= $batik['name']; ?></h5>
                                <p class="card-text price"><strong><?= rupiah($batik['harga_jual']); ?></strong> </p>
                                <a href="/detail/<?= $batik['slug']; ?>" class="btn btn-success badge mb-2">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?= $this->endSection(); ?>