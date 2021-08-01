<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MotifModel;

class Motif extends BaseController
{
    protected $motifModel;
    public function __construct()
    {
        $this->motifModel = new MotifModel();
    }
    public function index()
    {
        if (!isset($_SESSION['auth'])) {
            return redirect()->to('/');
        }
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $motif = $this->motifModel->searchMotif($keyword);
        } else {
            $motif = $this->motifModel->getMotif();
        }

        $data = [
            'motifs' => $motif,
            'validation' => \Config\Services::validation()
        ];

        return view('pages/admin/motif/index', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/motif/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'name' => 'required',
        ])) {
            return redirect()->to('/admin/motif/create')->withInput();
        }

        $this->motifModel->save([
            'name' => $this->request->getVar('name'),
            'slug' => url_title($this->request->getVar('name'), '-', true),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/motif')->withInput();
    }

    public function edit($slug)
    {

        $data = [
            'title' => "Form Ubah Data",
            'validation' => \Config\Services::validation(),
            'motif' => $this->motifModel->getMotif($slug)
        ];

        return view('pages/admin/motif/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'name' => 'required',
        ])) {
            return redirect()->to('/admin/motif/edit/' . $this->request->getVar('slug'))->withInput();
        }
        $this->motifModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => url_title($this->request->getVar('name'), '-', true),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/motif');
    }

    public function delete($id)
    {

        try {
            $this->motifModel->delete($id);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('/admin/motif');
        } catch (\Exception $e) {
            session()->setFlashdata('pesan', 'Data tidak dapat dihapus karena memiliki relasi dengan table lain');
            return redirect()->to('/admin/motif');
        }
    }

    public function ajax()
    {
        return json_encode($this->motifModel->ajaxMotif());
    }

    //--------------------------------------------------------------------

}
