<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    protected $artikelModel;
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        if (!isset($_SESSION['auth'])) {
            return redirect()->to('/');
        }
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $artikel = $this->artikelModel->searchArtikel($keyword);
        } else {
            $artikel = $this->artikelModel;
        }
        $data = [
            'artikels' => $artikel->getArtikel(),
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/artikel/index', $data);
    }

    public function detail($slug)
    {

        $data = [
            'title' => "Form Ubah Data",
            'validation' => \Config\Services::validation(),
            'artikel' => $this->artikelModel->getArtikel($slug)
        ];

        return view('pages/admin/artikel/detail', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/artikel/create', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'judul' => 'required',
            'image' => 'uploaded[image]',
            'content' => 'required',
            'sumber' => 'required'
        ])) {
            return redirect()->to('/admin/artikel/create')->withInput();
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
            $fileImage->move('images/artikel', $namaGambar);
        }
        $this->artikelModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'), '-', true),
            'sumber' => $this->request->getVar('sumber'),
            'image' => $namaGambar,
            'content' => $this->request->getVar('content'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/artikel');
    }

    public function edit($slug)
    {

        $data = [
            'title' => "Form Ubah Data",
            'validation' => \Config\Services::validation(),
            'artikel' => $this->artikelModel->getArtikel($slug)
        ];

        return view('pages/admin/artikel/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul' => 'required',
            'content' => 'required',
            'sumber' => 'required'
        ])) {
            return redirect()->to('/admin/artikel/edit/' . $this->request->getVar('slug'))->withInput();
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
            $fileImage->move('images/artikel', $namaGambar);
            //hapus file yang lama
            unlink('images/artikel/' . $this->request->getVar('oldImage'));
        }
        $this->artikelModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'), '-', true),
            'sumber' => $this->request->getVar('sumber'),
            'image' => $namaGambar,
            'content' => $this->request->getVar('content'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/artikel');
    }

    public function delete($id)
    {
        unlink('images/artikel/' . $this->artikelModel->getArtikelImageByID($id));
        $this->artikelModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/artikel');
    }
}
