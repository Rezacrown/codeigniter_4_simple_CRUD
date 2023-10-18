<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Memancing untuk Hari ini',
                'description' => 'description 1',
                'category_id' => 3,
                'author_id' => 1,
                'is_public' => true,
                'created_at' =>  date('Y:m:d h:i:s', time()),
                'updated_at' =>  date('Y:m:d h:i:s', time()),
            ],
            [
                'id' => 2,
                'name' => 'Olahraga teratur',
                'description' => 'description 2',
                'category_id' => 3,
                'author_id' => 2,
                'is_public' => true,
                'created_at' =>  date('Y:m:d h:i:s', time()),
                'updated_at' =>  date('Y:m:d h:i:s', time()),
            ],
            [
                'id' => 3,
                'name' => 'Berbisnis dengan orang itali',
                'description' => null,
                'category_id' => 1,
                'author_id' => 1,
                'is_public' => true, // 1 for true
                'created_at' =>  date('Y:m:d h:i:s', time()),
                'updated_at' =>  date('Y:m:d h:i:s', time()),
            ],
        ];


        $this->db->table('post')->insertBatch($data);
    }
}
