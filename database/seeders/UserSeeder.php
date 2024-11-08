<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Adi Nainggolan',
            'username' => 'evaluator',
            'nohp' => '08123456789',
            'email' => 'evaluator@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'admin'
        ]);
    }
}
