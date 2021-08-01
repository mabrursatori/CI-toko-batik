<?php

namespace App\Models;

use CodeIgniter\Model;

class MotifModel extends Model
{
    protected $table = 'motif';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'name', 'slug',];

    protected $motif;
    public function __construct()
    {
        $this->motif = \Config\Database::connect()->table('motif');
    }
    public function getMotif($slug = false)
    {

        if ($slug) {
            return $this->getWhere(['slug' => $slug], 1)->getRowArray();
        }
        return $this->asArray()->findAll();
    }

    public function searchMotif($keyword)
    {
        return $this->motif->like('name', $keyword)->get()->getResultArray();
    }

    public function ajaxMotif()
    {
        return $this->motif->get()->getResultObject();
    }
}
