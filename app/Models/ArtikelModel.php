<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'judul', 'slug', 'content', 'sumber', 'image'];

    public function getArtikel($slug = false)
    {
        if ($slug) {
            return $this->where(['slug' => $slug])->first();
        }
        return $this->findAll();
    }

    public function searchArtikel($keyword)
    {
        return $this->table('artikel')->like('judul', $keyword);
    }
    public function getArtikelImageByID($id)
    {
        $artikel = \Config\Database::connect()->table('artikel');
        return $artikel->getWhere(['id' => $id])->getFirstRow()->image;
    }
}
