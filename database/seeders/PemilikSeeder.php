<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PemilikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Pemilik',
            'username' => 'pemilik',
            'password' => Hash::make('pemilik'),
            'status' => 'pemilik',
        ]);

        DB::table('alamat')->insert([
            'username' => 'pemilik',
            'alamat' => 'kota padang',
            'no_hp' => '0812345678',
        ]);
    }
}
