<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'customer',
                'telepon' => '1',
                'password' => Hash::make('customer123'),
                'role' => 'Customer',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'nama' => 'admin',
                'telepon' => '2',
                'password' => Hash::make('admin123'),
                'role' => 'Admin',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'nama' => 'mekanik',
                'telepon' => '3',
                'password' => Hash::make('mekanik123'),
                'role' => 'Mekanik',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'nama' => 'magang',
                'telepon' => '4',
                'password' => Hash::make('magang123'),
                'role' => 'Magang',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'nama' => 'Budianto',
                'telepon' => '111',
                'password' => Hash::make('customer123'),
                'role' => 'Customer',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'nama' => 'Liana',
                'telepon' => '222',
                'password' => Hash::make('customer123'),
                'role' => 'Customer',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'nama' => 'Venita',
                'telepon' => '333',
                'password' => Hash::make('customer123'),
                'role' => 'Customer',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'nama' => 'Sulianto',
                'telepon' => '444',
                'password' => Hash::make('customer123'),
                'role' => 'Customer',
                'created_at'=> date('Y-m-d H:i:s')
            ],

            [
                'nama' => 'Susan',
                'telepon' => '555',
                'password' => Hash::make('customer123'),
                'role' => 'Customer',
                'created_at'=> date('Y-m-d H:i:s')
            ],
        ]);
    }
}
