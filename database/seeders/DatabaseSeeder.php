<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\MunicipioSeeder;
use Database\Seeders\ProvinciaSeeder;
use Database\Seeders\UsuarioSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            ProvinciaSeeder::class,
            MunicipioSeeder::class,
            UsuarioSeeder::class,
        ]);

    }
}
