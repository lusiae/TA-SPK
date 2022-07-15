<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Sbkriteria extends Model
{
    protected $table            = 'subkriteria';
    protected $primaryKey       = 'id_Skriteria';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_Skriteria', 'id_kriteria', 'nama_sub', 'bobot_sb'];




    //Tabel JOIN
    function getAll()
    {
        $builder = $this->db->table('subkriteria');
        $builder->join('kriteria', 'kriteria.id_kriteria = subkriteria.id_kriteria');
        $query   = $builder->get();
        return $query->getResult();
    }
}
