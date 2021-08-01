<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container frontend">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>Batik</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="" class="btn btn-primary">Edit</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">Cari</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <th scope="row">Judul</th>
                        <td><?= $artikel['judul']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Sumber</th>
                        <td><?= $artikel['sumber']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Konten</th>
                        <td><?= $artikel['content']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Gambar</th>
                        <td><img style="width: 100%;" src="/images/artikel/<?= $artikel['image']; ?>" alt=""></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container -->
<?= $this->endSection(); ?>