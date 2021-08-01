<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Batik ID</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/shop-homepage.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/assets/images/logo_batik-id.png" alt="" width="150px">

            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Artikel
                        </a>
                        <div class="dropdown-menu text-light bg-dropdown" aria-labelledby="navbarDropdown">
                            <?php foreach ($artikels as $artikel) : ?>
                                <a class="dropdown-item text-light" href="/artikel/<?= $artikel['slug']; ?>"><?= $artikel['judul']; ?></a>
                            <?php endforeach; ?>

                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Motif
                        </a>
                        <div class="dropdown-menu text-light bg-dropdown" aria-labelledby="navbarDropdown">
                            <?php foreach ($motifs as $motif) : ?>
                                <a class="dropdown-item text-light" href="/motif/<?= $motif['id']; ?>"><?= $motif['name']; ?></a>
                            <?php endforeach; ?>

                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kain
                        </a>
                        <div class="dropdown-menu text-light bg-dropdown" aria-labelledby="navbarDropdown">
                            <?php foreach ($kains as $kain) : ?>
                                <a class="dropdown-item text-light" href="/kain/<?= $kain['id']; ?>"><?= $kain['name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <form class="my-2 my-lg-0" action="/" method="post">
                            <?= csrf_field(); ?>
                            <div class="input-group search-form">
                                <input name="keyword" type="text" class="form-control" placeholder="Cari Batik">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text" id="basic-addon2" style="background-color: #311206; color: white;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <?= $this->renderSection('content'); ?>
    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row row-footer">
                <!-- PEMESANAN -->
                <div class="col-lg-4 text-light col-footer">
                    <h6>Temukan Kami</h6>
                    <a href="<?= $whatsapp; ?>?text=Bagaimana%20cara%20membeli%20batik%20di%20Batik%20ID%20?%20" target="_blank">
                        <img src="/assets/images/whatsapp_logo.png" alt="" style="width: 50px;">
                    </a>
                    <a href="<?= $shopee; ?>" target="_blank">
                        <img src="/assets/images/shopee_logo.png" alt="" style="width: 50px;">
                    </a>
                    <a href="<?= $tokopedia; ?>" target="_blank">
                        <img src="/assets/images/tokopedia_logo.png" alt="" style="width: 50px;">
                    </a>
                    <a href="<?= $bukalapak; ?>" target="_blank">
                        <img src="/assets/images/bukalapak_logo.png" alt="" style="width: 50px;">
                    </a>
                    <a href="<?= $instagram; ?>" target="_blank">
                        <img src="/assets/images/instagram_logo.png" alt="" style="width: 50px;">
                    </a>
                </div>
                <!-- TENTANG -->
                <div class="col-lg-4 text-light col-footer">
                    <h6>Links</h6>
                    <a href="<?= $whatsapp; ?>?text=Bagaimana%20cara%20membeli%20batik%20di%20Batik%20ID%20?%20" class="text-footer">
                        <p>Tentang Kami</p>
                    </a>
                    <a href="<?= $whatsapp; ?>?text=Bagaimana%20cara%20membeli%20batik%20di%20Batik%20ID%20?%20" target="_blank" class="text-footer">
                        <p>Bantuan</p>
                    </a>
                    <a href="<?= $whatsapp; ?>?text=Bagaimana%20cara%20membeli%20batik%20di%20Batik%20ID%20?%20" target="_blank" class="text-footer">
                        <p>Contact</p>
                    </a>
                </div>
                <!-- ALAMAT -->
                <div class="col-lg-4 text-light col-footer">
                    <h6>Alamat</h6>
                    <a href="https://maps.app.goo.gl/Kx9LQxuzkc7e4ER38" class="text-footer" target="_blank">
                        <p style="font-size: 14px;">
                            <strong>Centra Batik Trusmi</strong>
                        </p>
                        <p> Gedung Kantor Pasar Batik Trusmi LT 2
                            <br> Sekretariat Kampung UKM Digital Pasar Batik Trusmi Desa,
                            <br> Jl. Otto Iskandardinata No.KM, Weru Lor,
                            <br> Kec. Weru, Cirebon, Jawa Barat 45154
                        </p>
                    </a>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-12">
                    <p class="m-0 text-center text-white">Copyright &copy; <a href="http://mabrur.epizy.com" target="_blank">BatikID</a> 2021</p>
                </div>

            </div>

        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>