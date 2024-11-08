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
                'company_id' => 1,
                'title' => 'KTP Direksi',
                'type' => 'jpg',
                'size' => 1024,
                'file' => 'KTP.pdf',
                'upload_by' => 'Adi Nugroho',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
