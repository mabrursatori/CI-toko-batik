<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container frontend mb-1">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>Batik</h1>
        </div>
    </div>
    <form action="/admin/batik/update/<?= $batik['id']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <div class="row mt-3">
            <input type="hidden" value="<?= $batik['slug']; ?>" name="slug">
            <input type="hidden" value="<?= $batik['image']; ?>" name="oldImage">
            <div class="col-md-4">
                <div class="custom-file">
                    <!-- IMAGE -->
                    <input type="file" name="image" onchange="loadFile(event)" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image">
                    <div class="invalid-feedback">
                        <?= $validation->getError('image'); ?>
                    </div>
                    <label class="custom-file-label" for="image">Pilih Gambar</label>
                </div>
                <img src="/images/batik/<?= $batik['image']; ?>" id="output" class="rounded mt-2" alt="..." style="width: 350px;">
            </div>
            <div class="col-md-8">

                <div class="form-row">
                    <div class="form-group col-md-10">
                        <!-- NAMA -->
                        <label for="name">Nama</label>
                        <input type="text" name="name" value="<?= (old('name')) ? old('name') : $batik['name']; ?>" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name">
                        <div class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <!-- POPULAR -->
                        <div class="form-check" style="margin-top: 40px;">
                            <input class="form-check-input" name="populer" type="checkbox" value="1" id="popular" <?= (old('populer') == 1 || $batik['populer'] == 1) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="popular">
                                Popular
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="kain">Kain</label>
                        <select class="form-control <?= ($validation->hasError('kain')) ? 'is-invalid' : ''; ?>" id="kain" name="kain">
                            <option>PILIH KAIN</option>
                            <?php foreach ($kains as $kain) : ?>
                                <option <?= (old('kain') == $kain['id'] || $batik['kain_id'] == $kain['id']) ? 'selected' : ''; ?> value="<?= $kain['id']; ?>"><?= $kain['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kain'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="hidden" value='<?= json_encode($batik['motifs']); ?>' name="oldMotif">
                        <label for="motif">Motif:
                            <?php foreach ($batik['motifs'] as $batik) : ?>
                                <?= $batik . ', '; ?>
                            <?php endforeach; ?>
                        </label>
                        <select name="motif[]" multiple id="motif" class="form-control"></select>
                        <?php if ($validation->hasError('motif')) : ?>
                            <small class="form-text" style="color: red;"><?= $validation->getError('motif'); ?>.</small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" value="<?= (old('harga_beli')) ? old('harga_beli') : $harga_beli; ?>" name="harga_beli" class="form-control <?= ($validation->hasError('harga_beli')) ? 'is-invalid' : ''; ?>" id="harga_beli">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga_beli'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" value="<?= (old('harga_jual')) ? old('harga_jual') : $harga_jual; ?>" name="harga_jual" class="form-control <?= ($validation->hasError('harga_jual')) ? 'is-invalid' : ''; ?>" id="harga_jual">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga_jual'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="shopee">Shopee</label>
                        <input type="text" value="<?= (old('shopee')) ? old('shopee') : $shopee; ?>" name="shopee" class="form-control <?= ($validation->hasError('shopee')) ? 'is-invalid' : ''; ?>" id="shopee">
                        <div class="invalid-feedback">
                            <?= $validation->getError('shopee'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tokopedia">Tokopedia</label>
                        <input type="text" value="<?= (old('tokopedia')) ? old('tokopedia') : $tokopedia; ?>" name="tokopedia" class="form-control <?= ($validation->hasError('tokopedia')) ? 'is-invalid' : ''; ?>" id="tokopedia">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tokopedia'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="bukalapak">Bukalapak</label>
                        <input type="text" value="<?= (old('bukalapak')) ? old('bukalapak') : $bukalapak; ?>" name="bukalapak" class="form-control <?= ($validation->hasError('bukalapak')) ? 'is-invalid' : ''; ?>" id="bukalapak">
                        <div class="invalid-feedback">
                            <?= $validation->getError('bukalapak'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ukuran">Ukuran</label>
                        <input type="text" value="<?= (old('ukuran')) ? old('ukuran') : $ukuran; ?>" name="ukuran" class="form-control <?= ($validation->hasError('ukuran')) ? 'is-invalid' : ''; ?>" id="ukuran">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ukuran'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <!-- DESKRIPSI -->
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control ckeditor" name="deskripsi" id="deskripsi" rows="3">
                            <?= (old('deskripsi')) ? old('deskripsi') : $deskripsi; ?>
                    </textarea>
                    <?php if ($validation->hasError('deskripsi')) : ?>
                        <small class="form-text" style="color: red;"><?= $validation->getError('deskripsi'); ?>.</small>
                        <style>
                            #cke_deskripsi {
                                border: 1px solid red;
                            }
                        </style>
                    <?php endif; ?>
                </div>
                <div class="form-row text-right">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </div>
            </div>

        </div>
    </form>
</div>
<!-- /.container -->
<?= $this->endSection(); ?>