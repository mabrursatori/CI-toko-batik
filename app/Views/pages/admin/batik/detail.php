<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka);
    return $hasil_rupiah;
} ?>
<!-- Page Content -->
<div class="container frontend">
    <div class="row frontend mt-3">

        <!-- GAMBAR PRODUK -->
        <div class="col-md-5">
            <img src="/images/batik/<?= $batik['image']; ?>" class="rounded float-left" alt="..." style="width: 400px;">
        </div>

        <div class="col-md-7">
            <!-- FLASH -->
            <?php if (session()->getFlashData('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashData('pesan'); ?>
                </div>
            <?php endif; ?>
            <h3><?= $batik['name']; ?></h3>
            <table class="table table-sm">

                <tbody>
                    <tr>
                        <th scope="row">Kain</th>
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
                        <th scope="row">Harga Beli</th>
                        <td><?= $batik['harga_beli']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 100px;">Harga Jual</th>
                        <td><?= $batik['harga_jual']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 100px;">Tanggal</th>
                        <td><?= $batik['date']; ?></td>
                    </tr>
                    <tr>

                        <th scope="row">Shopee</th>
                        <td><?= $batik['shopee']; ?></td>
                    </tr>
                    <tr>

                        <th scope="row">Tokopedia</th>
                        <td><?= $batik['tokopedia']; ?></td>
                    </tr>
                    <tr>

                        <th scope="row">Bukalapak</th>
                        <td><?= $batik['bukalapak']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="7">
Website Resmi: www.batikid.store
Shopee: BatikID
Tokopedia: Batik ID Official
Bukalapak: Batik ID
Whatsapp: 085 624 436 317

Budayakan membaca sebelum membeli

*Batik Tulis
*Full Canting dan Pewarnaan Rendaman Air (bukan dicolet)
*Buatan Pengrajin Trusmi Cirebon
*Bahan <?= $batik['kainBatik'] . ' '; ?> 
*Ukuran <?= $batik['ukuran']; ?> .
*Bisa untuk dibuat jadi kemeja, dres, blus, kebaya dan lain-lain.
*Harga <?= rupiah($batik['harga_jual']) . ' '; ?>

*Real Pict, No efek, no edit dan no flash, warna sesuai yang difoto

*Batik tulisadalah kain yang dihias dengan teksture dan corak batik menggunakan tangan.
 Pembuatan batik jenis ini memakan waktu kurang lebih 2-3 bulan.

*Menerima pemesanan batik tulis sesuai motif yang diinginkan

Centra Batik Trusmi
Gedung Kantor Pasar Batik Trusmi LT 2
Sekretariat Kampung UKM Digital Pasar Batik Trusmi Desa,
Jl. Otto Iskandardinata No.KM, Weru Lor,
Kec. Weru, Cirebon, Jawa Barat 45154

#batiktulis #batiktrusmi #batikcirebon #batikmegamendung #batikindonesia #akucintabatik
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-right"><a href="/admin/batik/edit/<?= $batik['slug']; ?>" class="btn btn-primary">Edit</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- /.container -->
<?= $this->endSection(); ?>