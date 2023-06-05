<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kendaraans')->insert([
            [
                'merek' => 'Honda',
                'gambar' => 'images/logo_honda.jpg',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'merek' => 'BMW',
                'gambar' => 'images/logo_bmw.png',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'merek' => 'Toyota',
                'gambar' => 'images/logo_toyota.jpeg',
                'created_at'=> date('Y-m-d H:i:s')
            ],
        ]);
    }
}
