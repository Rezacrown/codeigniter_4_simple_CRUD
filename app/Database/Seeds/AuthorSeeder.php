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
                'created_at' =>  date('Y:m:d h:i:s', time()),
                'updated_at' =>  date('Y:m:d h:i:s', time()),
            ],
            [
                'id' => 2,
                'name' => 'Udin',
                'created_at' =>  date('Y:m:d h:i:s', time()),
                'updated_at' =>  date('Y:m:d h:i:s', time()),
            ],
        ];


        $this->db->table('author')->insertBatch($data);
    }
}
