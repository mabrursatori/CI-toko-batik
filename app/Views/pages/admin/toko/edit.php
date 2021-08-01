<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container frontend">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>Toko / Edit</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="/admin/toko/update/<?= $toko['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $toko['slug']; ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?= (old('name')) ? old('name') : $toko['name']; ?>" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name">
                    <div class="invalid-feedback">
                        <?= $validation->getError('name'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" name="link" value="<?= (old('link')) ? old('link') : $toko['link']; ?>" class="form-control <?= ($validation->hasError('link')) ? 'is-invalid' : ''; ?>" id="link">
                    <div class="invalid-feedback">
                        <?= $validation->getError('link'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container -->
<?= $this->endSection(); ?>