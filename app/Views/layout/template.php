<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Batik</title>
    <!-- Javascript -->
    <script type="text/javascript">
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <!-- Ck4Editor -->
    <script type="text/javascript" src="/assets/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Admin Batik ID</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin">User
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/batik">Batik
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/motif">Motif
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/kain">Kain
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/toko">Toko
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/artikel">Artikel
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/gambar">Gambar
                        </a>
                    </li>
                    <li class="nav-item active btn-logout">
                        <a class="nav-link" href="/logout">Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <?= $this->renderSection('content'); ?>


    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <a href="http://mabrur.epizy.com" target="_blank">Mabrur</a> 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets.vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#motif').select2({
            ajax: {
                url: '/admin/motif/ajax',
                processResults: function(data) {
                    data = JSON.parse(data);
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.id,
                                text: item.name
                            }
                        })
                    }
                }
            }
        });
    </script>
</body>

</html>