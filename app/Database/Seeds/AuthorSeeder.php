<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Raka',
                'email' => 'Raka@gmail.com',
                'password' => password_hash('rahasia', CRYPT_SHA256),
                'is_admin' => true,
                'created_at' =>  date('Y:m:d h:i:s', time()),
                'updated_at' =>  date('Y:m:d h:i:s', time()),
            ],
            [
                'id' => 2,
                'name' => 'Udin',
                'email' => 'udin12@gmail.com',
                'password' => password_hash('rahasia', CRYPT_SHA256),
                'is_admin' => true,
                'created_at' =>  date('Y:m:d h:i:s', time()),
                'updated_at' =>  date('Y:m:d h:i:s', time()),
            ],
        ];


        $this->db->table('author')->insertBatch($data);
    }
}
