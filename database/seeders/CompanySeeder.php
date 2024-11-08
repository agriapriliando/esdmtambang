<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'name_company' => 'PT. Berkat Sejahtera Abadi',
                'kontak' => '081234567890',
                'email' => 'a@a.com',
                'catatan' => 'Isi Catatan',
                'company_code' => '',
                'limit_share' => 0,
                'password_active' => 0,
                'password' => '',
                'is_active' => 1, //aktivitas perusahaan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_company' => 'CV. Makmur Sentosa Mulia',
                'kontak' => '081234567888',
                'email' => 'b@b.com',
                'catatan' => 'Isi Catatan',
                'company_code' => '',
                'limit_share' => 0,
                'password_active' => 0,
                'password' => '',
                'is_active' => 1, //aktivitas perusahaan
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
