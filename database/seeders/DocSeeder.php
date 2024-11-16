<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('docs')->insert([
            [
                'id' => Carbon::now()->timestamp . rand(11111, 99999),
                'company_id' => 1,
                'title' => 'KTP Direksi',
                'type' => 'jpg',
                'size' => 1024,
                'file_link' => '0928348.pdf',
                'upload_by' => 'Adi Nugroho',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Carbon::now()->timestamp . rand(11111, 99999),
                'company_id' => 1,
                'title' => 'Dokumen Foto Lapangan',
                'type' => 'zip',
                'size' => 1024,
                'file_link' => '234398734.zip',
                'upload_by' => 'Adi Nugroho',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
