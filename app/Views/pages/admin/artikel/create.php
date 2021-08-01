<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container frontend mb-1">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>Batik</h1>
        </div>
    </div>
    <form action="/admin/artikel/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row mt-3">

            <div class="col-md-4">
                <div class="cimage">
                    <input type="file" name="image" accept="image/*" onchange="loadFile(event)" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image">
                    <label class="custom-file-label" for="customFile">Piih Gambar</label>
                    <div class="invalid-feedback">
                        <?= $validation->getError('image'); ?>
                    </div>
                </div>
                <img src="/assets/images/default-image.jpg" id="output" class="rounded mt-2" alt="..." style="width: 350px;">
            </div>
            <div class="col-md-8">

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="judul">Judul</label>
                        <input name="judul" value="<?= old('judul'); ?>" type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="sumber">Sumber</label>
                        <input name="sumber" value="<?= old('sumber'); ?>" type="text" class="form-control <?= ($validation->hasError('sumber')) ? 'is-invalid' : ''; ?>" id="sumber">
                        <div class="invalid-feedback">
                            <?= $validation->getError('sumber'); ?>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea name="content" class="form-control ckeditor" id="content" rows="3"><?= old('content'); ?></textarea>
                    <?php if ($validation->hasError('content')) : ?>
                        <small class="form-text" style="color: red;"><?= $validation->getError('content'); ?>.</small>
                        <style>
                            #cke_content {
                                border: 1px solid red;
                            }
                        </style>
                    <?php endif; ?>
                </div>
                <div class="form-row text-right">
                    <div class="col-md-12">
                        <button href="" type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </div>
            </div>

        </div>
    </form>
</div>
<!-- /.container -->
<?= $this->endSection(); ?>