<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoAlertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TipoAlerta::create([
            'codigo' => '1001',
            'referencia' => 'Actividades Delictivas',
            'descripcion' => 'Esta persona posee registro o está relacionado con evento de actividades delictivas',
        ]);
        \App\Models\TipoAlerta::create([
            'codigo' => '1002',
            'referencia' => 'Actividad de la conducta',
            'descripcion' => 'Esta persona está registrada en actividades no procesadas, en actividades relacionada a su conducta, 
                                estas pueden ser: Actos de irresponsabilidad, 
                                Irrespeto, sindicalismo, abuso del alcohol, No adaptabilidad Laboral, accidente laboral.',
        ]);
        \App\Models\TipoAlerta::create([
            'codigo' => '1003',
            'referencia' => 'Prueba de Contagio',
            'descripcion' => 'Esta persona posee enfermedades contagiosas, no está apto para laborar donde se relaciona de manera directa con personas y productos de consumo humano. ',
        ]);
        \App\Models\TipoAlerta::create([
            'codigo' => '1004',
            'referencia' => 'Reforzar Integridad',
            'descripcion' => 'Esta persona realiza movimiento por sectores calificados calificado como de alta peligrosidad, por la falta de información en sus documentos personales, es posible que haya que enviarlo a depurar por huellas dactilares. se sugiere:reforzar la integridad con recomendaciones personalizadas, visitas domiciliarias o levantamiento de sus huellas dactilares.',
        ]);
        \App\Models\TipoAlerta::create([
            'codigo' => '100S',
            'referencia' => 'No hay Novedad',
            'descripcion' => 'Esta persona no presenta novedad alguna.',
        ]);
        \App\Models\TipoAlerta::create([
            'codigo' => '100P',
            'referencia' => 'Pendiente',
            'descripcion' => 'Pendiente de realizar prueba.',
        ]);
    }
}
