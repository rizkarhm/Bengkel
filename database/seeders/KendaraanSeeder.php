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
            ],
            [
                'merek' => 'BMW',
                'gambar' => 'images/logo_bmw.png',
            ],
        ]);
    }
}
