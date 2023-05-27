<?php

namespace Database\Seeders;

use App\Models\Kontak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kontaks')->insert([
            [
                'nama' => 'Alamat',
                'isi' => 'Jl Segaran Gg Dahlia Kav. 9',
            ],

            [
                'nama' => 'Nomor Telepon',
                'isi' => '081913211707',
            ],

            [
                'nama' => 'Link Maps',
                'isi' => 'https://goo.gl/maps/jque8WdXJeiPPctG9',
            ],

            [
                'nama' => 'E-Mail',
                'isi' => 'kalil-autoservice@gmail.com',
            ],
        ]);
    }
}
