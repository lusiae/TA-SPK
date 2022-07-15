<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Admin extends Model
{
    protected $table            = 'super_admin';
    protected $primaryKey       = 'id_Sadmin';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_Sadmin', 'nama_lengkap', 'username_Sadmin', 'password', 'akses'];
    protected $useTimestamps    = true;
}
