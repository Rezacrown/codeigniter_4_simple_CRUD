<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IndexSeeder extends Seeder
{
    public function run()
    {

        $this->call('AuthorSeeder');
        $this->call('CategorySeeder');
        $this->call('PostSeeder');
    }
}
