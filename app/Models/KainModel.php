<?php

namespace App\Models;

use CodeIgniter\Model;

class KainModel extends Model
{
    protected $table = 'kain';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'name', 'slug',];

    public function getKain($slug = false)
    {
        if ($slug) {
            return $this->where(['slug' => $slug])->first();
        }
        return $this->findAll();
    }

    public function searchKain($keyword)
    {
        return $this->table('kain')->like('name', $keyword);
    }
}
