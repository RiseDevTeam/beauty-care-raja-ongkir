<?php

namespace Database\Seeders;

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
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'status' => 'admin',
        ]);

        DB::table('alamat')->insert([
            'username' => 'admin',
            'alamat' => 'kota padang',
            'no_hp' => '0812345678',
        ]);
    }
}
