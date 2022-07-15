<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Mahasiswa extends Model
{
    protected $table            = 'alternatif';
    protected $primaryKey       = 'id_alternatif';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_alternatif', 'npm', 'nama_mahasiswa', 'program_studi', 'tahun'];
    protected $useTimestamps    = true;

    function getAll()
    {
        $builder = $this->db->table('alternatif');
        $builder->join('jurusan', 'jurusan.nama_jurusan = alternatif.program_studi');
        $query   = $builder->get();
        return $query->getResult();
    }
}
