<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container frontend">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>Edit Gambar</h1>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col-md-6">
            <form action="/admin/gambar/update/<?= $gambar['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" value="<?= $gambar['url']; ?>" name="oldUrl">
                <input type="hidden" value="<?= $gambar['id']; ?>" name="id">
                <input type="hidden" value="<?= $gambar['slug']; ?>" name="slug">
                <div class="form-group">
                    <label for="ordinal">Urutan</label>
                    <input type="number" name="ordinal" value="<?= (old('ordinal')) ? old('ordinal') : $gambar['ordinal']; ?>" class="form-control <?= ($validation->hasError('ordinal')) ? 'is-invalid' : ''; ?>" id="ordinal">
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
                    <img src="/images/landing/<?= $gambar['url']; ?>" id="output" class="rounded" alt="..." style="width: 500px;">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container -->

<?= $this->endSection(); ?>