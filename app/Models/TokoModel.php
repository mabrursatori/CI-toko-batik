<?php

namespace App\Models;

use CodeIgniter\Model;

class TokoModel extends Model
{
    protected $table = 'toko';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'name', 'link', 'slug'];

    public function getToko($slug = false)
    {
        if ($slug) {
            return $this->where(['slug' => $slug])->first();
        }
        return $this->findAll();
    }

    public function searchToko($keyword)
    {
        return $this->table('toko')->like('name', $keyword);
    }
}
