<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NomorskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nomorsks')->insert([
            [
                'company_id' => 1,
                'tahapan_id' => 1,
                'region_id' => "62.01.01",
                'nomorsk' => '1231232323322',
                'tgl_mulai' => Carbon::now(),
                'tgl_selesai' => Carbon::now()->addYears(2),
                'provinsi' => 'Kalimantan Tengah',
                'kabupaten' => 'KAB. KOTAWARINGIN BARAT',
                'kecamatan' => 'Kumai',
                'kelurahan' => 'Desa ....',
                'luasha' => '3000',
                'alamat_sk' => 'Jalan Kertagama, Kec. Kumai, Kab. Kotawaringin Barat, Kalimantan Tengah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
