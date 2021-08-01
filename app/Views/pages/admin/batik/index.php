<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container frontend">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>Batik</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="/admin/batik/create" class="btn btn-primary">Tambah Batik</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Batik">
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
                        <th scope="col">Nama</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Motif Batik</th>
                        <th scope="col">Kain Batik</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Populer</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($batiks as $batik) : ?>
                        <tr>
                            <th scope="row">1</th>
                            <td style="width: 200px;"><?= $batik['name']; ?></td>
                            <td style="width: 130px;"><img src="/images/batik/<?= $batik['image']; ?>" class="rounded float-left" alt="..." width="120px"></td>
                            <td>
                                <?php foreach ($batik['motifs'] as $motif) : ?>
                                    <li><?= $motif; ?></li>
                                <?php endforeach; ?>
                            </td>
                            <td><?= $batik['kainBatik']; ?></td>
                            <td><?= $batik['harga_beli']; ?></td>
                            <td><?= $batik['harga_jual']; ?></td>
                            <td><?= ($batik['populer']) ? 'Ya' : 'Tidak' ?></td>
                            <td>
                                <a href="/admin/batik/detail/<?= $batik['slug']; ?>" class="btn btn-warning btn-sm mb-1">Detail</a>
                                <br>
                                <form action="/admin/batik/delete/<?= $batik['id']; ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="confirm('apakah anda yakin?')" class="btn btn-danger btn-sm mb-1">Hapus</button>
                                </form>
                                <br>
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