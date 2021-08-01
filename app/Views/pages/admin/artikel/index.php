<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container frontend">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>Artikel</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="/admin/artikel/create" class="btn btn-primary">Tambah Artikel</a>
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
                        <th scope="col">Judul</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($artikels as $artikel) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $artikel['judul']; ?></td>
                            <td><img src="/images/artikel/<?= $artikel['image']; ?>" class="rounded float-left" alt="..." width="120px"></td>
                            <td><a href="/admin/artikel/edit/<?= $artikel['slug']; ?>" class="btn btn-success btn-sm mb-1">Edit</a>
                                <a href="/admin/artikel/detail/<?= $artikel['slug']; ?>" class="btn btn-primary btn-sm mb-1">Detail</a>
                                <form action="/admin/artikel/delete/<?= $artikel['id']; ?>" class="d-inline">
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