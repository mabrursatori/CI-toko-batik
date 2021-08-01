<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarModel extends Model
{
    protected $table = 'gambar';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'url', 'slug', 'ordinal'];
    protected $gambar;
    public function __construct()
    {
        $this->gambar = \Config\Database::connect()->table('gambar');
    }
    public function getGambar($slug = false)
    {
        if ($slug) {
            return $this->where(['slug' => $slug])->get()->getRowArray();
        }
        return $this->asArray()->findAll();
    }


    public function getGambarUrlByID($id)
    {
        return $this->gambar->getWhere(['id' => $id])->getFirstRow()->url;
    }
}
