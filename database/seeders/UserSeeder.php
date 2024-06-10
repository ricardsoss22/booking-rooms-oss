<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@localhost',
            'usertype' => 'admin',
            'password' => bcrypt('123'),
        ]);
        User::create([
            'name' => 'test',
            'email' => 'test@localhost',
            'usertype' => 'user',
            'password' => bcrypt('123'),
        ]);
    }
}
