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
                'role' => 'Customer'
            ],

            [
                'nama' => 'admin',
                'telepon' => '2',
                'password' => Hash::make('admin123'),
                'role' => 'Admin'
            ],

            [
                'nama' => 'mekanik',
                'telepon' => '3',
                'password' => Hash::make('mekanik123'),
                'role' => 'Mekanik'
            ],

            [
                'nama' => 'magang',
                'telepon' => '4',
                'password' => Hash::make('magang123'),
                'role' => 'Magang'
            ],
        ]);
    }
}
