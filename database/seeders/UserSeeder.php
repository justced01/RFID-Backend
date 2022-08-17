<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run()
    {
       DB::table('users')->insert([
            [
                'first_name' => 'User',
                'middle_name' => '',
                'last_name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => bcrypt('password'),
                'role' => '1'
            ],
        ]);
    }
}

