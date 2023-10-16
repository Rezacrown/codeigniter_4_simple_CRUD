<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Politik',
                'created_at' =>  date('Y:m:d h:i:s', time()),
                'updated_at' =>  date('Y:m:d h:i:s', time()),
            ],
            [
                'id' => 2,
                'name' => 'comedy',
                'created_at' =>  date('Y:m:d h:i:s', time()),
                'updated_at' =>  date('Y:m:d h:i:s', time()),
            ],
            [
                'id' => 3,
                'name' => 'lifestyle',
                'created_at' =>  date('Y:m:d h:i:s', time()),
                'updated_at' =>  date('Y:m:d h:i:s', time()),
            ],
        ];


        $this->db->connect(true);
        $this->db->table('category')->insertBatch($data);
    }
}
