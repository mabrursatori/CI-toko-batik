<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KainModel;

class Kain extends BaseController
{
    protected $kainModel;
    public function __construct()
    {
        $this->kainModel = new KainModel();
    }

    public function index()
    {
        if (!isset($_SESSION['auth'])) {
            return redirect()->to('/');
        }
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kain = $this->kainModel->searchKain($keyword);
        } else {
            $kain = $this->kainModel;
        }

        $data = [
            'kains' => $kain->getKain(),
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/kain/index', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/kain/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'name' => 'required',
        ])) {
            return redirect()->to('/admin/kain/create')->withInput();
        }

        $this->kainModel->save([
            'name' => $this->request->getVar('name'),
            'slug' => url_title($this->request->getVar('name'), '-', true),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/kain');
    }

    public function edit($slug)
    {

        $data = [
            'title' => "Form Ubah Data",
            'validation' => \Config\Services::validation(),
            'kain' => $this->kainModel->getKain($slug)
        ];

        return view('pages/admin/kain/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'name' => 'required',
        ])) {
            return redirect()->to('/admin/kain/edit/' . $this->request->getVar('slug'))->withInput();
        }
        $this->kainModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => url_title($this->request->getVar('name'), '-', true),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/kain');
    }

    public function delete($id)
    {
        try {
            $this->kainModel->delete($id);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('/admin/kain');
        } catch (\Exception $e) {
            session()->setFlashdata('pesan', 'Data Gagal dihapus karena memilki hubungan dengan table lain');
            return redirect()->to('/admin/kain');
        }
    }
}
