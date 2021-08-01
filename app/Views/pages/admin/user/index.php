<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container frontend">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>User</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="/admin/user/edit" class="btn btn-primary">Edit User</a>
        </div>
    </div>

    <div class="row mt-3">
        <!-- FLASH -->
        <?php if (session()->getFlashData('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashData('pesan'); ?>
            </div>
        <?php endif; ?>
        <table class="table table-sm">
            <tbody>
                <tr>
                    <th scope="row">Nama</th>
                    <td><?= $user['name']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td><?= $user['email']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Password</th>
                    <td><?= $user['password']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
<!-- /.container -->
<?= $this->endSection(); ?>