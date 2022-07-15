<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_MahasiswaBobot extends Model
{
    protected $table            = 'bobot_alternatif';
    protected $primaryKey       = 'id_ba';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_ba', 'id_kriteria', 'alternatif1', '	alternatif2', 'bobot'];
    protected $useTimestamps    = true;

    function getAll()
    {
        $builder = $this->db->table('bobot_alternatif');
        $builder->join('kriteria', 'kriteria.id_kriteria = bobot_alternatif.id_kriteria');
        $query   = $builder->get();
        return $query->getResult();
    }
}
