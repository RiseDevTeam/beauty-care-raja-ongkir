<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return voidgit 
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            PemilikSeeder::class,
            CouriersTableSeeder::class,
            LocationsTableSeeder::class,
        ]);
    }
}
