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
                'user_id' => '1',
                'kendaraan_id' => '1',
                'model' => 'HRV 2019',
                'nopol' => 'N 9182 GJ',
                'tgl_masuk' => '2023-06-01',
                'tgl_selesai' => '',
                'pic_id' => null,
                'status' => 'Booked',
                'penanganan' => '',
                'ket_pembatalan' => '',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'user_id' => '1',
                'kendaraan_id' => '3',
                'model' => 'Agya 2013',
                'nopol' => 'F 1111 JA',
                'tgl_masuk' => '2023-06-01',
                'tgl_selesai' => '2023-06-03',
                'pic_id' => '4',
                'status' => 'Canceled',
                'penanganan' => '',
                'ket_pembatalan' => 'dibatalkan',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'user_id' => '1',
                'kendaraan_id' => '2',
                'model' => 'Z3',
                'nopol' => 'AG 9182 AGJ',
                'tgl_masuk' => '2023-01-01',
                'tgl_selesai' => '2023-06-01',
                'pic_id' => '3',
                'status' => 'Done',
                'penanganan' => 'sudah selesai',
                'ket_pembatalan' => '',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'user_id' => '2',
                'kendaraan_id' => '2',
                'model' => 'Z3',
                'nopol' => 'AG 9182 AGJ',
                'tgl_masuk' => '2023-03-01',
                'tgl_selesai' => '2023-06-01',
                'pic_id' => '3',
                'status' => 'Done',
                'penanganan' => 'sudah selesai',
                'ket_pembatalan' => '',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'user_id' => '2',
                'kendaraan_id' => '1',
                'model' => 'HRV 2019',
                'nopol' => 'N 9182 GJ',
                'tgl_masuk' => '2023-06-01',
                'tgl_selesai' => '',
                'pic_id' => null,
                'status' => 'Booked',
                'penanganan' => '',
                'ket_pembatalan' => '',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'user_id' => '1',
                'kendaraan_id' => '1',
                'model' => 'HRV 2019',
                'nopol' => 'N 9182 GJ',
                'tgl_masuk' => '2023-08-01',
                'tgl_selesai' => '',
                'pic_id' => null,
                'status' => 'Booked',
                'penanganan' => '',
                'ket_pembatalan' => '',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'user_id' => '1',
                'kendaraan_id' => '3',
                'model' => 'Agya 2013',
                'nopol' => 'F 1111 JA',
                'tgl_masuk' => '2023-07-01',
                'tgl_selesai' => '2023-06-03',
                'pic_id' => '4',
                'status' => 'Canceled',
                'penanganan' => '',
                'ket_pembatalan' => 'dibatalkan',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'user_id' => '1',
                'kendaraan_id' => '2',
                'model' => 'Z3',
                'nopol' => 'AG 9182 AGJ',
                'tgl_masuk' => '2023-01-06',
                'tgl_selesai' => '2023-06-01',
                'pic_id' => '3',
                'status' => 'Done',
                'penanganan' => 'sudah selesai',
                'ket_pembatalan' => '',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'user_id' => '2',
                'kendaraan_id' => '2',
                'model' => 'Z3',
                'nopol' => 'AG 9182 AGJ',
                'tgl_masuk' => '2023-02-01',
                'tgl_selesai' => '2023-06-01',
                'pic_id' => '3',
                'status' => 'Done',
                'penanganan' => 'sudah selesai',
                'ket_pembatalan' => '',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'user_id' => '2',
                'kendaraan_id' => '1',
                'model' => 'HRV 2019',
                'nopol' => 'N 9182 GJ',
                'tgl_masuk' => '2023-11-01',
                'tgl_selesai' => '',
                'pic_id' => null,
                'status' => 'Booked',
                'penanganan' => '',
                'ket_pembatalan' => '',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'user_id' => '1',
                'kendaraan_id' => '1',
                'model' => 'HRV 2019',
                'nopol' => 'N 9182 GJ',
                'tgl_masuk' => '2023-09-01',
                'tgl_selesai' => '',
                'pic_id' => null,
                'status' => 'Booked',
                'penanganan' => '',
                'ket_pembatalan' => '',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'user_id' => '1',
                'kendaraan_id' => '3',
                'model' => 'Agya 2013',
                'nopol' => 'F 1111 JA',
                'tgl_masuk' => '2023-03-01',
                'tgl_selesai' => '2023-06-03',
                'pic_id' => '4',
                'status' => 'Canceled',
                'penanganan' => '',
                'ket_pembatalan' => 'dibatalkan',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'user_id' => '1',
                'kendaraan_id' => '2',
                'model' => 'Z3',
                'nopol' => 'AG 9182 AGJ',
                'tgl_masuk' => '2023-06-01',
                'tgl_selesai' => '2023-06-01',
                'pic_id' => '3',
                'status' => 'Done',
                'penanganan' => 'sudah selesai',
                'ket_pembatalan' => '',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'user_id' => '2',
                'kendaraan_id' => '2',
                'model' => 'Z3',
                'nopol' => 'AG 9182 AGJ',
                'tgl_masuk' => '2023-06-01',
                'tgl_selesai' => '2023-06-01',
                'pic_id' => '3',
                'status' => 'Done',
                'penanganan' => 'sudah selesai',
                'ket_pembatalan' => '',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'user_id' => '2',
                'kendaraan_id' => '1',
                'model' => 'HRV 2019',
                'nopol' => 'N 9182 GJ',
                'tgl_masuk' => '2023-12-01',
                'tgl_selesai' => '',
                'pic_id' => null,
                'status' => 'Booked',
                'penanganan' => '',
                'ket_pembatalan' => '',
                'created_at'=> date('Y-m-d H:i:s')
            ],
        ]);
    }
}
