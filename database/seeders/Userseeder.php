<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'admin1', 'email' => 'admin1@gmail.com', 'role' => 'admin', 'password' => bcrypt('123')]);
        User::create(['name' => 'student', 'email' => 'student1@gmail.com', 'role' => 'student', 'password' => bcrypt('123')]);
    }
}
