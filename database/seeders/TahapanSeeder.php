<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataTahapan = [
            [
                "name_tahapan" => "Pilih Tahapan IUP",
                "desc_tahapan" => "Pilih Tahapan IUP",
            ],
            [
                "name_tahapan" => "Operasi Produksi",
                "desc_tahapan" => "Operasi Produksi",
            ],
            [
                "name_tahapan" => "Eksplorasi",
                "desc_tahapan" => "Eksplorasi",
            ],
            [
                "name_tahapan" => "Perpanjangan (1) Operasi Produksi",
                "desc_tahapan" => "Perpanjangan (1) Operasi Produksi",
            ],
            [
                "name_tahapan" => "Perpanjangan (2) Operasi Produksi",
                "desc_tahapan" => "Perpanjangan (2) Operasi Produksi",
            ],
            [
                "name_tahapan" => "Perpanjangan Operasi Produksi",
                "desc_tahapan" => "Perpanjangan Operasi Produksi",
            ]
        ];

        DB::table('tahapans')->insert($dataTahapan);
    }
}
