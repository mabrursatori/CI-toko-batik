<?= $this->extend('layout/global'); ?>

<?= $this->section('content'); ?>
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka);
    return $hasil_rupiah;
} ?>
<!-- Page Content -->
<div class="container mobile-margin frontend" style="margin-top: 3rem!important">


    <div class="row frontend mt-3">
        <!-- GAMBAR PRODUK -->
        <div class="col-md-5 ">
            <img src="/images/batik/<?= $batik['image']; ?>" class="rounded float-left" alt="..." style="width: 100%;">
        </div>

        <div class="col-md-7">
            <h3><?= $batik['name']; ?></h3>
            <table class="table table-sm">

                <tbody>
                    <tr>
                        <th scope="row">Bahan</th>
                        <td><?= $batik['kainBatik']; ?></td>

                    </tr>
                    <tr>
                        <th scope="row">Ukuran</th>
                        <td><?= $batik['ukuran']; ?></td>

                    </tr>
                    <tr>
                        <th scope="row">Motif</th>
                        <td>
                            <ul>
                                <?php foreach ($batik['motifs'] as $motif) : ?>
                                    <li><?= $motif; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </td>

                    <tr>
                        <th scope="row">Deskripsi</th>
                        <td colspan="2"><?= $batik['deskripsi']; ?></td>

                    </tr>
                    <tr>
                        <th scope="row">Harga</th>
                        <td><?= rupiah($batik['harga_jual']); ?></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="2">Beli Melalui :</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="<?= $whatsapp; ?>?text=<?= $batik['shopee']; ?>%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0AApakah%20batik%20ini%20masih%20tersedia%20?%20" target="_blank">
                                <img src="/assets/images/whatsapp_logo.png" alt="" style="width: 50px;">
                            </a>
                            <a href="<?= $batik['shopee']; ?>" target="_blank">
                                <img src="/assets/images/shopee_logo.png" alt="" style="width: 50px;">
                            </a>
                            <a href="<?= $batik['tokopedia']; ?>" target="_blank">
                                <img src="/assets/images/tokopedia_logo.png" alt="" style="width: 50px;">
                            </a>
                            <a href="<?= $batik['bukalapak']; ?>" target="_blank">
                                <img src="/assets/images/bukalapak_logo.png" alt="" style="width: 50px;">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?= $this->endSection(); ?>