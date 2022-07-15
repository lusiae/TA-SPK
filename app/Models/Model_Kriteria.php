<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Kriteria extends Model
{
    protected $table            = 'kriteria';
    protected $primaryKey       = 'id_kriteria';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_kriteria', 'nama_kriteria', 'bobot'];
    protected $useTimestamps    = true;
}
