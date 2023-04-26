<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provincia::create(['nombre' => 'Distrito Nacional']);
        Provincia::create(['nombre' => 'Azua']);
        Provincia::create(['nombre' => 'Baoruco']);
        Provincia::create(['nombre' => 'Barahona']);
        Provincia::create(['nombre' => 'Dajabón']);
        Provincia::create(['nombre' => 'Duarte']);
        Provincia::create(['nombre' => 'El Seibo']);
        Provincia::create(['nombre' => 'Elías Piña']);
        Provincia::create(['nombre' => 'Espaillat']);
        Provincia::create(['nombre' => 'Hato Mayor']);
        Provincia::create(['nombre' => 'Hermanas Mirabal']);
        Provincia::create(['nombre' => 'Independencia']);
        Provincia::create(['nombre' => 'La Altagracia']);
        Provincia::create(['nombre' => 'La Romana']);
        Provincia::create(['nombre' => 'La Vega']);
        Provincia::create(['nombre' => 'María Trinidad Sánchez']);
        Provincia::create(['nombre' => 'Monseñor Nouel']);
        Provincia::create(['nombre' => 'Montecristi']);
        Provincia::create(['nombre' => 'Monte Plata']);
        Provincia::create(['nombre' => 'Pedernales']);
        Provincia::create(['nombre' => 'Peravia']);
        Provincia::create(['nombre' => 'Puerto Plata']);
        Provincia::create(['nombre' => 'Samaná']);
        Provincia::create(['nombre' => 'San Cristóbal']);
        Provincia::create(['nombre' => 'San José de Ocoa']);
        Provincia::create(['nombre' => 'San Juan']);
        Provincia::create(['nombre' => 'San Pedro de Macorís']);
        Provincia::create(['nombre' => 'Sánchez Ramírez']);
        Provincia::create(['nombre' => 'Santiago']);
        Provincia::create(['nombre' => 'Santiago Rodríguez']);
        Provincia::create(['nombre' => 'Santo Domingo']);
        Provincia::create(['nombre' => 'Valverde']);
    }
}
