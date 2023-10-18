<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IndexSeeder extends Seeder
{
    public function run()
    {

        $this->call('CategorySeeder');
        $this->call('AuthorSeeder');
        $this->call('PostSeeder');
    }
}
