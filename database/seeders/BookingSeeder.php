<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
            [
                'user_id' => '5',
                'kendaraan_id' => '3',
                'model' => 'Civic 2003',
                'nopol' => 'B 6532 FA',
                'masalah' => 'kerusakan',
                'tgl_masuk' => '2023-06-01',
                'tgl_selesai' => '2023-06-05',
                'pic_id' => 3,
                'status' => 'Done',
                'penanganan' => 'Sudah selesai',
                'ket_pembatalan' => null,
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'user_id' => '6',
                'kendaraan_id' => '3',
                'model' => 'Avanza',
                'nopol' => 'N 9182 GJ',
                'masalah' => 'kerusakan',
                'tgl_masuk' => '2023-01-01',
                'tgl_selesai' => '-',
                'pic_id' => null,
                'status' => 'Canceled',
                'penanganan' => null,
                'ket_pembatalan' => 'Dibatalkan',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'user_id' => '7',
                'kendaraan_id' => '3',
                'model' => 'Alphard',
                'nopol' => 'AG 9182 GJ',
                'masalah' => 'kerusakan',
                'tgl_masuk' => '2023-12-01',
                'tgl_selesai' => null,
                'pic_id' => 4,
                'status' => 'Proccessed',
                'penanganan' => null,
                'ket_pembatalan' => null,
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'user_id' => '1',
                'kendaraan_id' => '1',
                'model' => 'HRV 2019',
                'nopol' => 'N 9182 GJ',
                'masalah' => 'kerusakan',
                'tgl_masuk' => '2023-06-01',
                'tgl_selesai' => null,
                'pic_id' => null,
                'status' => 'Booked',
                'penanganan' => null,
                'ket_pembatalan' => null,
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'user_id' => '5',
                'kendaraan_id' => '1',
                'model' => 'Brio 2015',
                'nopol' => 'D 9182 ADD',
                'masalah' => 'kerusakan',
                'tgl_masuk' => '2023-06-01',
                'tgl_selesai' => null,
                'pic_id' => null,
                'status' => 'Booked',
                'penanganan' => null,
                'ket_pembatalan' => null,
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'user_id' => '6',
                'kendaraan_id' => '1',
                'model' => 'Freed 2010',
                'nopol' => 'F 1109 GJ',
                'masalah' => 'kerusakan',
                'tgl_masuk' => '2023-07-01',
                'tgl_selesai' => null,
                'pic_id' => null,
                'status' => 'Booked',
                'penanganan' => null,
                'ket_pembatalan' => null,
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'user_id' => '7',
                'kendaraan_id' => '1',
                'model' => 'Civic 2003',
                'nopol' => 'B 6532 FA',
                'masalah' => 'kerusakan',
                'tgl_masuk' => '2023-06-01',
                'tgl_selesai' => null,
                'pic_id' => null,
                'status' => 'Booked',
                'penanganan' => null,
                'ket_pembatalan' => null,
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'user_id' => '8',
                'kendaraan_id' => '2',
                'model' => 'Z3',
                'nopol' => 'N 9182 GJ',
                'masalah' => 'kerusakan',
                'tgl_masuk' => '2023-01-01',
                'tgl_selesai' => null,
                'pic_id' => null,
                'status' => 'In Queue',
                'penanganan' => null,
                'ket_pembatalan' => null,
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'user_id' => '9',
                'kendaraan_id' => '2',
                'model' => 'M1',
                'nopol' => 'AG 9182 GJ',
                'masalah' => 'kerusakan',
                'tgl_masuk' => '2023-12-01',
                'tgl_selesai' => null,
                'pic_id' => null,
                'status' => 'In Queue',
                'penanganan' => null,
                'ket_pembatalan' => null,
                'created_at'=> date('Y-m-d H:i:s')
            ],

        ]);
    }
}
