<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container frontend">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>User</h1>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col-md-6">
            <form action="/admin/gambar/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="ordinal">Urutan</label>
                    <input type="text" name="ordinal" value="<?= old('ordinal'); ?>" class="form-control <?= ($validation->hasError('ordinal')) ? 'is-invalid' : ''; ?>" id="ordinal">
                    <div class="invalid-feedback">
                        <?= $validation->getError('ordinal'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" onchange="loadFile(event)" name="url" class="custom-file-input <?= ($validation->hasError('url')) ? 'is-invalid' : ''; ?>" id="url" name="url">
                        <label class="custom-file-label" for="url">Pilih Gambar</label>
                        <div class="invalid-feedback">
                            <?= $validation->getError('url'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <img src="/assets/images/default-image.jpg" id="output" class="rounded" alt="..." style="width: 500px;">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container -->

<?= $this->endSection(); ?>