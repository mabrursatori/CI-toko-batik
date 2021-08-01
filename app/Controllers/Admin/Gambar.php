<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GambarModel;

class Gambar extends BaseController
{
    protected $gambarModel;
    public function __construct()
    {
        $this->gambarModel = new GambarModel();
    }

    public function index()
    {
        if (!isset($_SESSION['auth'])) {
            return redirect()->to('/');
        }
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $gambar = $this->gambarModel->searchGambar($keyword);
        } else {

            $gambar = $this->gambarModel;
        }
        $data = [
            'gambars' => $gambar->getGambar(),
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/gambar/index', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/gambar/create', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'url' => 'mime_in[url,image/jpg,image/jpeg,image/png]',
            'ordinal' => 'required'
        ])) {
            return redirect()->to('/admin/gambar/create')->withInput();
        }
        //ambil data
        $fileImage = $this->request->getFile('url');
        $namaGambar = null;
        //apakah tidak ada gambar yang di upload
        if ($fileImage->getError() == 4) {
            $namaGambar = 'default-image.jpg';
        } else {
            //generater nama random
            $namaGambar = $fileImage->getRandomName();
            //pindahkan file ke folder img
            $fileImage->move('images/landing', $namaGambar);
        }
        $this->gambarModel->save([
            'url' => $namaGambar,
            'slug' => url_title($namaGambar, '-', true),
            'ordinal' => $this->request->getVar('ordinal')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/gambar');
    }

    public function edit($slug)
    {

        $data = [
            'title' => "Form Ubah Data",
            'validation' => \Config\Services::validation(),
            'gambar' => $this->gambarModel->getGambar($slug)
        ];

        return view('pages/admin/gambar/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'url' => 'mime_in[url,image/jpg,image/jpeg,image/png]',
            'ordinal' => 'required'
        ])) {
            return redirect()->to('/admin/gambar/edit/' . $this->request->getVar('slug'))->withInput();
        }
        //ambil data
        $fileImage = $this->request->getFile('url');
        $namaGambar = null;
        //apakah tidak ada gambar yang di upload
        if ($fileImage->getError() == 4) {
            $namaGambar = $this->request->getVar('oldUrl');
        } else {
            //generater nama random
            $namaGambar = $fileImage->getRandomName();
            //pindahkan file ke folder img
            $fileImage->move('images/landing', $namaGambar);
            //hapus file yang lama
            unlink('images/landing/' . $this->request->getVar('oldUrl'));
        }
        $this->gambarModel->save([
            'id' => $id,
            'url' => $namaGambar,
            'slug' => url_title($namaGambar, '-', true),
            'ordinal' => $this->request->getVar('ordinal')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/gambar');
    }

    public function delete($id)
    {
        unlink('images/landing/' . $this->gambarModel->getGambarUrlByID($id));
        $this->gambarModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/gambar');
    }
}
