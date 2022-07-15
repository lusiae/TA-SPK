<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     'id_Sadmin' => '22222',
        //     'nama_lengkap' => 'Lusia Exsillianawaty',
        //     'username_Sadmin' => 'lusia@gmail.com',
        //     'password' => password_hash('1234', PASSWORD_BCRYPT),
        //     'akses' => 'Super Administrator',
        //     'level' => '1',
        // ];

        // $this->db->table('super_admin')->insert($data);

        //Multi Data
        $data = [
            [
                'id_Sadmin' => '33333',
                'nama_lengkap' => 'Reonaldo',
                'username_Sadmin' => 'Rey@gmail.com',
                'password' => password_hash('1111', PASSWORD_BCRYPT),
                'akses' => 'Super Administrator',
                'level' => '1',
            ],
            [
                'id_Sadmin' => '44444',
                'nama_lengkap' => 'Ciki Ra',
                'username_Sadmin' => 'Cikra@gmail.com',
                'password' => password_hash('2222', PASSWORD_BCRYPT),
                'akses' => 'Admin',
                'level' => '2',
            ],

        ];

        $this->db->table('super_admin')->insertBatch($data);
    }
}
