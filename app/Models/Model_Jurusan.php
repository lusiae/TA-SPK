<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Jurusan extends Model
{
    protected $table            = 'jurusan';
    protected $primaryKey       = 'id_jurusan';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_jurusan', 'nama_jurusan', 'bobot'];
}
