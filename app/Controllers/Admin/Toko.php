<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TokoModel;

class Toko extends BaseController
{
    protected $tokoModel;
    public function __construct()
    {
        $this->tokoModel = new TokoModel();
    }

    public function index()
    {
        if (!isset($_SESSION['auth'])) {
            return redirect()->to('/');
        }
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $toko = $this->tokoModel->searchToko($keyword);
        } else {
            $toko = $this->tokoModel;
        }

        $data = [
            'tokos' => $toko->getToko(),
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/toko/index', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/toko/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'name' => 'required',
            'link' => 'required',
        ])) {
            return redirect()->to('/admin/toko/create')->withInput();
        }
        $this->tokoModel->save([
            'name' => $this->request->getVar('name'),
            'link' => $this->request->getVar('link'),
            'slug' => url_title($this->request->getVar('name'), '-', true)
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/toko');
    }

    public function edit($slug)
    {

        $data = [
            'title' => "Form Ubah Data",
            'validation' => \Config\Services::validation(),
            'toko' => $this->tokoModel->getToko($slug)
        ];

        return view('pages/admin/toko/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'name' => 'required',
            'link' => 'required',
        ])) {
            return redirect()->to('/admin/toko/edit/' . $this->request->getVar('slug'))->withInput();
        }
        $this->tokoModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => url_title($this->request->getVar('name'), '-', true),
            'link' => $this->request->getVar('link')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/toko');
    }

    public function delete($id)
    {
        $this->tokoModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/toko');
    }
}
