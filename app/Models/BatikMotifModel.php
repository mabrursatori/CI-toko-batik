<?php

namespace App\Models;

use CodeIgniter\Model;

class BatiMotifModel extends Model
{
    protected $table = 'batik_motif';
    protected $useTimestamps = true;
    protected $allowedFields = ['batik_id', 'motif_id'];
}
