<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container frontend">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>Batik</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="/admin/gambar/create" class="btn btn-primary">Tambah Gambar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="/admin/gambar" method="post">
                <?= csrf_field(); ?>
                <div class="input-group mb-3">
                    <input name="keyword" type="text" class="form-control" placeholder="Cari Gambar">
                    <div class="input-group-append">
                        <button class="input-group-text" id="basic-addon2">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <!-- FLASH -->
            <?php if (session()->getFlashData('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashData('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">URL</th>
                        <th scope="col">Urutan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($gambars as $gambar) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/images/landing/<?= $gambar['url']; ?>" style="width: 200px;" alt=""></td>
                            <td><?= $gambar['ordinal']; ?></td>
                            <td><a href="/admin/gambar/edit/<?= $gambar['slug']; ?>" class="btn btn-success btn-sm mb-1">Edit</a>
                                <form action="/admin/gambar/delete/<?= $gambar['id']; ?>" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="confirm('apakah anda yakin ?')" class="btn btn-danger btn-sm mb-1">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container -->
<?= $this->endSection(); ?>