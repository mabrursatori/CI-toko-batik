<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container frontend">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>User</h1>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="/admin/user/update/<?= $user['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="<?= (old('name')) ? old('name') : $user['name']; ?>" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="<?= (old('email')) ? old('email') : $user['email']; ?>" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" value="<?= (old('password')) ? old('password') : $user['password']; ?>" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container -->
<?= $this->endSection(); ?>