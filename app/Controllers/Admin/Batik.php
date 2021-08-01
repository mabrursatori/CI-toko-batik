<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BatikModel;
use App\Models\KainModel;
use DateTimeZone;
use DateTime;

class Batik extends BaseController
{
    protected $batikModel;
    protected $kainModel;
    public function __construct()
    {
        $this->batikModel = new BatikModel();
        $this->kainModel = new KainModel();
    }

    public function index()
    {
        if (!isset($_SESSION['auth'])) {
            return redirect()->to('/');
        }
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $batik = $this->batikModel->searchBatik($keyword);
        } else {
            $batik = $this->batikModel;
        }

        $data = [
            'batiks' => $this->batikModel->getBatik(),
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/batik/index', $data);
    }

    public function detail($slug)
    {
        
        $data = [
            'batik' => $this->batikModel->getBatik($slug)
        ];
        return view('pages/admin/batik/detail', $data);
    }

    public function create()
    {
        $data = [
            'kains' => $this->kainModel->getKain(),
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/batik/create', $data);
    }

    public function save()
    {
        $array = $this->kainModel->getKain();
        $ruleKain = [];
        foreach ($array as $arr) {
            array_push($ruleKain, (int)$arr['id']);
        }
        $ruleKain = json_encode($ruleKain);
        if (!$this->validate([
            'name' => 'required',
            'image' => 'uploaded[image]',
            'kain' => 'required|in_list' . $ruleKain,
            'motif' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'ukuran' => 'required',
            'deskripsi' => 'required'
        ])) {
            return redirect()->to('/admin/batik/create')->withInput();
        }

        //ambil data
        $fileImage = $this->request->getFile('image');
        $namaGambar = null;
        //apakah tidak ada gambar yang di upload
        if ($fileImage->getError() == 4) {
            $namaGambar = 'default-image.jpg';
        } else {
            //generater nama random
            $namaGambar = $fileImage->getRandomName();
            //pindahkan file ke folder img
            $fileImage->move('images/batik', $namaGambar);
        }

        $tz_object = new DateTimeZone('Asia/Jakarta');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $namaBatik = $this->request->getVar('name') . " Kode 0" . $this->batikModel->getLastID();
        $slug = url_title($namaBatik, '-', true);
        $this->batikModel->save([
            'name' => $namaBatik,
            'slug' => $slug,
            'ukuran' => $this->request->getVar('ukuran'),
            'date' => $datetime->format('Y\-m\-d\ h:i:s'),
            'image' => $namaGambar,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga_beli' => $this->request->getVar('harga_beli'),
            'harga_jual' => $this->request->getVar('harga_jual'),
            'populer' => ($this->request->getVar('populer')) ? 1 : 0,
            'kain_id' => $this->request->getVar('kain')
        ]);
        $id = $this->batikModel->getBatik($slug)['id'];
        //tambah motif batik
        $this->batikModel->insertMotifBatik($id, $this->request->getVar('motif'));

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/batik');
    }

    public function delete($id)
    {
        unlink('images/batik/' . $this->batikModel->getBatikImageByID($id));
        $this->batikModel->deleteMotifBatik($id);
        $this->batikModel->deleteBatik($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/batik');
    }

    public function edit($slug)
    {
        $batik = $this->batikModel->getBatik($slug);
        $data = [
            'batik' => $batik,
            'kains' => $this->kainModel->getKain(),
            'validation' => \Config\Services::validation(),
            'harga_beli' => $batik['harga_beli'],
            'harga_jual' => $batik['harga_jual'],
            'shopee' => $batik['shopee'],
            'tokopedia' => $batik['tokopedia'],
            'bukalapak' => $batik['bukalapak'],
            'ukuran' => $batik['ukuran'],
            'deskripsi' => $batik['deskripsi']
        ];
        return view('pages/admin/batik/edit', $data);
    }

    public function update($id)
    {
        $array = $this->kainModel->getKain();
        $ruleKain = [];
        foreach ($array as $arr) {
            array_push($ruleKain, (int)$arr['id']);
        }
        $ruleKain = json_encode($ruleKain);
        if (!$this->validate([
            'name' => 'required',
            'kain' => 'required|in_list' . $ruleKain,
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'ukuran' => 'required',
            'deskripsi' => 'required'
        ])) {
            return redirect()->to('/admin/batik/edit/' . $this->request->getVar('slug'))->withInput();
        }

        //ambil data
        $fileImage = $this->request->getFile('image');
        $namaGambar = null;
        //apakah tidak ada gambar yang di upload
        if ($fileImage->getError() == 4) {

            $namaGambar = $this->request->getVar('oldImage');
        } else {
            //generater nama random
            $namaGambar = $fileImage->getRandomName();
            //pindahkan file ke folder img
            $fileImage->move('images/batik', $namaGambar);
            //hapus file yang lama
            unlink('images/batik/' . $this->request->getVar('oldImage'));
        }

        $tz_object = new DateTimeZone('Asia/Jakarta');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->batikModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'ukuran' => $this->request->getVar('ukuran'),
            'image' => $namaGambar,
            'date' => $datetime->format('Y\-m\-d\ h:i:s'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga_beli' => $this->request->getVar('harga_beli'),
            'harga_jual' => $this->request->getVar('harga_jual'),
            'shopee' => $this->request->getVar('shopee'),
            'tokopedia' => $this->request->getVar('tokopedia'),
            'bukalapak' => $this->request->getVar('bukalapak'),
            'populer' => ($this->request->getVar('populer')) ? 1 : 0,
            'kain_id' => $this->request->getVar('kain')
        ]);

        if ($this->request->getVar('motif')) {
            $this->batikModel->deleteMotifBatik($id);
            $this->batikModel->insertMotifBatik($id, $this->request->getVar('motif'));
        }
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/batik/detail/' . $slug);
    }
}
