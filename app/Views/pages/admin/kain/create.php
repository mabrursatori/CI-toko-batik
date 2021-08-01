<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container frontend">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>Kain / Create</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="/admin/kain/save" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?= old('judul'); ?>" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name">
                    <div class="invalid-feedback">
                        <?= $validation->getError('name'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container -->
<?= $this->endSection(); ?>