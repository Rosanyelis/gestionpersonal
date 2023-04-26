<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipio1 =  DB::table('provincias')->where('nombre', 'Distrito Nacional')->first();
        Municipio::create(['provincia_id' => $municipio1->id, 'nombre' => 'Distrito Nacional',]);

        $municipio2 =  DB::table('provincias')->where('nombre', 'Azua')->first();
        Municipio::create(['provincia_id' => $municipio2->id, 'nombre' => 'Azua de Compostela']);
        Municipio::create(['provincia_id' => $municipio2->id, 'nombre' => 'Estebanía',]);
        Municipio::create(['provincia_id' => $municipio2->id, 'nombre' => 'Guayabal',]);
        Municipio::create(['provincia_id' => $municipio2->id, 'nombre' => 'Las Charcas',]);
        Municipio::create(['provincia_id' => $municipio2->id, 'nombre' => 'Las Yayas de Viajama',]);
        Municipio::create(['provincia_id' => $municipio2->id, 'nombre' => 'Padre Las Casas',]);
        Municipio::create(['provincia_id' => $municipio2->id, 'nombre' => 'Peralta',]);
        Municipio::create(['provincia_id' => $municipio2->id, 'nombre' => 'Pueblo Viejo',]);
        Municipio::create(['provincia_id' => $municipio2->id, 'nombre' => 'Sabana Yegua',]);
        Municipio::create(['provincia_id' => $municipio2->id, 'nombre' => 'Tábara Arriba',]);

        $municipio3 =  DB::table('provincias')->where('nombre', 'Baoruco')->first();
        Municipio::create(['provincia_id' => $municipio3->id, 'nombre' => 'Neiba',]);
        Municipio::create(['provincia_id' => $municipio3->id, 'nombre' => 'Galván',]);
        Municipio::create(['provincia_id' => $municipio3->id, 'nombre' => 'Los Ríos',]);
        Municipio::create(['provincia_id' => $municipio3->id, 'nombre' => 'Villa Jaragua',]);
        Municipio::create(['provincia_id' => $municipio3->id, 'nombre' => 'Tamayo',]);

        $municipio4 =  DB::table('provincias')->where('nombre', 'Barahona')->first();
        Municipio::create(['provincia_id' => $municipio4->id, 'nombre' => 'Barahona',]);
        Municipio::create(['provincia_id' => $municipio4->id, 'nombre' => 'Cabral',]);
        Municipio::create(['provincia_id' => $municipio4->id, 'nombre' => 'El Peñón',]);
        Municipio::create(['provincia_id' => $municipio4->id, 'nombre' => 'Enriquillo',]);
        Municipio::create(['provincia_id' => $municipio4->id, 'nombre' => 'Fundación',]);
        Municipio::create(['provincia_id' => $municipio4->id, 'nombre' => 'Jaquimeyes',]);
        Municipio::create(['provincia_id' => $municipio4->id, 'nombre' => 'La Ciénaga',]);
        Municipio::create(['provincia_id' => $municipio4->id, 'nombre' => 'Las Salinas',]);
        Municipio::create(['provincia_id' => $municipio4->id, 'nombre' => 'Paraíso',]);
        Municipio::create(['provincia_id' => $municipio4->id, 'nombre' => 'Polo',]);
        Municipio::create(['provincia_id' => $municipio4->id, 'nombre' => 'Vicente Noble',]);

        $municipio5 =  DB::table('provincias')->where('nombre', 'Dajabón')->first();
        Municipio::create(['provincia_id' => $municipio5->id, 'nombre' => 'Dajabón',]);
        Municipio::create(['provincia_id' => $municipio5->id, 'nombre' => 'El Pino',]);
        Municipio::create(['provincia_id' => $municipio5->id, 'nombre' => 'Loma de Cabrera',]);
        Municipio::create(['provincia_id' => $municipio5->id, 'nombre' => 'Partido',]);
        Municipio::create(['provincia_id' => $municipio5->id, 'nombre' => 'Restauración',]);

        $municipio6 =  DB::table('provincias')->where('nombre', 'Duarte')->first();
        Municipio::create(['provincia_id' => $municipio6->id, 'nombre' => 'San Francisco de Macorís',]);
        Municipio::create(['provincia_id' => $municipio6->id, 'nombre' => 'Arenoso',]);
        Municipio::create(['provincia_id' => $municipio6->id, 'nombre' => 'Castillo',]);
        Municipio::create(['provincia_id' => $municipio6->id, 'nombre' => 'Eugenio María de Hostos',]);
        Municipio::create(['provincia_id' => $municipio6->id, 'nombre' => 'Las Guáranas',]);
        Municipio::create(['provincia_id' => $municipio6->id, 'nombre' => 'Pimentel',]);
        Municipio::create(['provincia_id' => $municipio6->id, 'nombre' => 'Villa Riva',]);

        $municipio7 =  DB::table('provincias')->where('nombre', 'El Seibo')->first();
        Municipio::create(['provincia_id' => $municipio7->id, 'nombre' => 'El Seibo',]);
        Municipio::create(['provincia_id' => $municipio7->id, 'nombre' => 'Miches',]);

        $municipio8 =  DB::table('provincias')->where('nombre', 'Elías Piña')->first();
        Municipio::create(['provincia_id' => $municipio8->id, 'nombre' => 'Comendador',]);
        Municipio::create(['provincia_id' => $municipio8->id, 'nombre' => 'Bánica',]);
        Municipio::create(['provincia_id' => $municipio8->id, 'nombre' => 'El Llano',]);
        Municipio::create(['provincia_id' => $municipio8->id, 'nombre' => 'Hondo Valle',]);
        Municipio::create(['provincia_id' => $municipio8->id, 'nombre' => 'Juan Santiago',]);
        Municipio::create(['provincia_id' => $municipio8->id, 'nombre' => 'Pedro Santana',]);

        $municipio9 =  DB::table('provincias')->where('nombre', 'Espaillat')->first();
        Municipio::create(['provincia_id' => $municipio9->id, 'nombre' => 'Moca',]);
        Municipio::create(['provincia_id' => $municipio9->id, 'nombre' => 'Cayetano Germosén',]);
        Municipio::create(['provincia_id' => $municipio9->id, 'nombre' => 'Gaspar Hernández',]);
        Municipio::create(['provincia_id' => $municipio9->id, 'nombre' => 'Jamao al Norte',]);

        $municipio10 =  DB::table('provincias')->where('nombre', 'Hato Mayor')->first();
        Municipio::create(['provincia_id' => $municipio10->id, 'nombre' => 'Hato Mayor del Rey',]);
        Municipio::create(['provincia_id' => $municipio10->id, 'nombre' => 'El Valle',]);
        Municipio::create(['provincia_id' => $municipio10->id, 'nombre' => 'Sabana de la Mar',]);

        $municipio11 =  DB::table('provincias')->where('nombre', 'Hermanas Mirabal')->first();
        Municipio::create(['provincia_id' => $municipio11->id, 'nombre' => 'Salcedo',]);
        Municipio::create(['provincia_id' => $municipio11->id, 'nombre' => 'Tenares',]);
        Municipio::create(['provincia_id' => $municipio11->id, 'nombre' => 'Villa Tapia',]);

        $municipio12 =  DB::table('provincias')->where('nombre', 'Independencia')->first();
        Municipio::create(['provincia_id' => $municipio12->id, 'nombre' => 'Jimaní',]);
        Municipio::create(['provincia_id' => $municipio12->id, 'nombre' => 'Cristóbal',]);
        Municipio::create(['provincia_id' => $municipio12->id, 'nombre' => 'Duvergé',]);
        Municipio::create(['provincia_id' => $municipio12->id, 'nombre' => 'La Descubierta',]);
        Municipio::create(['provincia_id' => $municipio12->id, 'nombre' => 'Mella',]);
        Municipio::create(['provincia_id' => $municipio12->id, 'nombre' => 'Postrer Río',]);

        $municipio13 =  DB::table('provincias')->where('nombre', 'La Altagracia')->first();
        Municipio::create(['provincia_id' => $municipio13->id, 'nombre' => 'Higüey',]);
        Municipio::create(['provincia_id' => $municipio13->id, 'nombre' => 'San Rafael del Yuma',]);

        $municipio14 =  DB::table('provincias')->where('nombre', 'La Romana')->first();
        Municipio::create(['provincia_id' => $municipio14->id, 'nombre' => 'La Romana',]);
        Municipio::create(['provincia_id' => $municipio14->id, 'nombre' => 'Guaymate',]);
        Municipio::create(['provincia_id' => $municipio14->id, 'nombre' => 'Villa Hermosa',]);

        $municipio15 =  DB::table('provincias')->where('nombre', 'La Vega')->first();
        Municipio::create(['provincia_id' => $municipio15->id, 'nombre' => 'La Concepción de La Vega',]);
        Municipio::create(['provincia_id' => $municipio15->id, 'nombre' => 'Constanza',]);
        Municipio::create(['provincia_id' => $municipio15->id, 'nombre' => 'Jarabacoa',]);
        Municipio::create(['provincia_id' => $municipio15->id, 'nombre' => 'Jima Abajo',]);

        $municipio16 =  DB::table('provincias')->where('nombre', 'María Trinidad Sánchez')->first();
        Municipio::create(['provincia_id' => $municipio16->id, 'nombre' => 'Nagua',]);
        Municipio::create(['provincia_id' => $municipio16->id, 'nombre' => 'Cabrera',]);
        Municipio::create(['provincia_id' => $municipio16->id, 'nombre' => 'El Factor',]);
        Municipio::create(['provincia_id' => $municipio16->id, 'nombre' => 'Río San Juan',]);

        $municipio17 =  DB::table('provincias')->where('nombre', 'Monseñor Nouel')->first();
        Municipio::create(['provincia_id' => $municipio17->id, 'nombre' => 'Bonao',]);
        Municipio::create(['provincia_id' => $municipio17->id, 'nombre' => 'Maimón',]);
        Municipio::create(['provincia_id' => $municipio17->id, 'nombre' => 'Piedra Blanca',]);

        $municipio18 =  DB::table('provincias')->where('nombre', 'Montecristi')->first();
        Municipio::create(['provincia_id' => $municipio18->id, 'nombre' => 'Montecristi',]);
        Municipio::create(['provincia_id' => $municipio18->id, 'nombre' => 'Castañuela',]);
        Municipio::create(['provincia_id' => $municipio18->id, 'nombre' => 'Guayubín',]);
        Municipio::create(['provincia_id' => $municipio18->id, 'nombre' => 'Las Matas de Santa Cruz',]);
        Municipio::create(['provincia_id' => $municipio18->id, 'nombre' => 'Pepillo Salcedo',]);
        Municipio::create(['provincia_id' => $municipio18->id, 'nombre' => 'Villa Vásquez',]);

        $municipio19 =  DB::table('provincias')->where('nombre', 'Monte Plata')->first();
        Municipio::create(['provincia_id' => $municipio19->id, 'nombre' => 'Monte Plata',]);
        Municipio::create(['provincia_id' => $municipio19->id, 'nombre' => 'Bayaguana',]);
        Municipio::create(['provincia_id' => $municipio19->id, 'nombre' => 'Peralvillo',]);
        Municipio::create(['provincia_id' => $municipio19->id, 'nombre' => 'Sabana Grande de Boyá',]);
        Municipio::create(['provincia_id' => $municipio19->id, 'nombre' => 'Yamasá',]);

        $municipio20 =  DB::table('provincias')->where('nombre', 'Pedernales')->first();
        Municipio::create(['provincia_id' => $municipio20->id, 'nombre' => 'Pedernales',]);
        Municipio::create(['provincia_id' => $municipio20->id, 'nombre' => 'Oviedo',]);

        $municipio21 =  DB::table('provincias')->where('nombre', 'Peravia')->first();
        Municipio::create(['provincia_id' => $municipio21->id, 'nombre' => 'Peravia',]);
        Municipio::create(['provincia_id' => $municipio21->id, 'nombre' => 'Nizao',]);

        $municipio22 =  DB::table('provincias')->where('nombre', 'Puerto Plata')->first();
        Municipio::create(['provincia_id' => $municipio22->id, 'nombre' => 'Puerto Plata',]);
        Municipio::create(['provincia_id' => $municipio22->id, 'nombre' => 'Altamira',]);
        Municipio::create(['provincia_id' => $municipio22->id, 'nombre' => 'Guananico',]);
        Municipio::create(['provincia_id' => $municipio22->id, 'nombre' => 'Imbert',]);
        Municipio::create(['provincia_id' => $municipio22->id, 'nombre' => 'Los Hidalgos',]);
        Municipio::create(['provincia_id' => $municipio22->id, 'nombre' => 'Luperón',]);
        Municipio::create(['provincia_id' => $municipio22->id, 'nombre' => 'Sosúa',]);
        Municipio::create(['provincia_id' => $municipio22->id, 'nombre' => 'Villa Isabela',]);
        Municipio::create(['provincia_id' => $municipio22->id, 'nombre' => 'Villa Montellano',]);

        $municipio23 =  DB::table('provincias')->where('nombre', 'Samaná')->first();
        Municipio::create(['provincia_id' => $municipio23->id, 'nombre' => 'Samaná',]);
        Municipio::create(['provincia_id' => $municipio23->id, 'nombre' => 'Las Terrenas',]);
        Municipio::create(['provincia_id' => $municipio23->id, 'nombre' => 'Sánchez',]);

        $municipio24 =  DB::table('provincias')->where('nombre', 'San Cristóbal')->first();
        Municipio::create(['provincia_id' => $municipio24->id, 'nombre' => 'San Cristóbal',]);
        Municipio::create(['provincia_id' => $municipio24->id, 'nombre' => 'Bajos de Haina',]);
        Municipio::create(['provincia_id' => $municipio24->id, 'nombre' => 'Cambita Garabito',]);
        Municipio::create(['provincia_id' => $municipio24->id, 'nombre' => 'Los Cacaos',]);
        Municipio::create(['provincia_id' => $municipio24->id, 'nombre' => 'Sabana Grande de Palenque',]);
        Municipio::create(['provincia_id' => $municipio24->id, 'nombre' => 'San Gregorio de Nigua',]);
        Municipio::create(['provincia_id' => $municipio24->id, 'nombre' => 'Villa Altagracia',]);
        Municipio::create(['provincia_id' => $municipio24->id, 'nombre' => 'Yaguate',]);

        $municipio25 =  DB::table('provincias')->where('nombre', 'San José de Ocoa')->first();
        Municipio::create(['provincia_id' => $municipio25->id, 'nombre' => 'San José de Ocoa',]);
        Municipio::create(['provincia_id' => $municipio25->id, 'nombre' => 'Rancho Arriba',]);
        Municipio::create(['provincia_id' => $municipio25->id, 'nombre' => 'Sabana Larga',]);

        $municipio26 =  DB::table('provincias')->where('nombre', 'San Juan')->first();
        Municipio::create(['provincia_id' => $municipio26->id, 'nombre' => 'San Juan de la Maguana',]);
        Municipio::create(['provincia_id' => $municipio26->id, 'nombre' => 'Bohechío',]);
        Municipio::create(['provincia_id' => $municipio26->id, 'nombre' => 'El Cercado',]);
        Municipio::create(['provincia_id' => $municipio26->id, 'nombre' => 'Juan de Herrera',]);
        Municipio::create(['provincia_id' => $municipio26->id, 'nombre' => 'Las Matas de Farfán',]);
        Municipio::create(['provincia_id' => $municipio26->id, 'nombre' => 'Vallejuelo',]);

        $municipio27 =  DB::table('provincias')->where('nombre', 'San Pedro de Macorís')->first();
        Municipio::create(['provincia_id' => $municipio27->id, 'nombre' => 'San Pedro de Macorís',]);
        Municipio::create(['provincia_id' => $municipio27->id, 'nombre' => 'Consuelo',]);
        Municipio::create(['provincia_id' => $municipio27->id, 'nombre' => 'Guayacanes',]);
        Municipio::create(['provincia_id' => $municipio27->id, 'nombre' => 'Quisqueya',]);
        Municipio::create(['provincia_id' => $municipio27->id, 'nombre' => 'Ramón Santana',]);
        Municipio::create(['provincia_id' => $municipio27->id, 'nombre' => 'San José de Los Llanos',]);

        $municipio28 =  DB::table('provincias')->where('nombre', 'Sánchez Ramírez')->first();
        Municipio::create(['provincia_id' => $municipio28->id, 'nombre' => 'Cotuí',]);
        Municipio::create(['provincia_id' => $municipio28->id, 'nombre' => 'Cevicos',]);
        Municipio::create(['provincia_id' => $municipio28->id, 'nombre' => 'Fantino',]);
        Municipio::create(['provincia_id' => $municipio28->id, 'nombre' => 'La Mata',]);

        $municipio29 =  DB::table('provincias')->where('nombre', 'Santiago')->first();
        Municipio::create(['provincia_id' => $municipio29->id, 'nombre' => 'Santiago',]);
        Municipio::create(['provincia_id' => $municipio29->id, 'nombre' => 'Bisonó',]);
        Municipio::create(['provincia_id' => $municipio29->id, 'nombre' => 'Jánico',]);
        Municipio::create(['provincia_id' => $municipio29->id, 'nombre' => 'Licey al Medio',]);
        Municipio::create(['provincia_id' => $municipio29->id, 'nombre' => 'Puñal',]);
        Municipio::create(['provincia_id' => $municipio29->id, 'nombre' => 'Sabana Iglesia',]);
        Municipio::create(['provincia_id' => $municipio29->id, 'nombre' => 'San José de las Matas',]);
        Municipio::create(['provincia_id' => $municipio29->id, 'nombre' => 'Tamboril',]);
        Municipio::create(['provincia_id' => $municipio29->id, 'nombre' => 'Villa González',]);

        $municipio30 =  DB::table('provincias')->where('nombre', 'Santiago Rodríguez')->first();
        Municipio::create(['provincia_id' => $municipio30->id, 'nombre' => 'San Ignacio de Sabaneta',]);
        Municipio::create(['provincia_id' => $municipio30->id, 'nombre' => 'Los Almácigos',]);
        Municipio::create(['provincia_id' => $municipio30->id, 'nombre' => 'Monción',]);

        $municipio31 =  DB::table('provincias')->where('nombre', 'Santo Domingo')->first();
        Municipio::create(['provincia_id' => $municipio31->id, 'nombre' => 'Santo Domingo Este',]);
        Municipio::create(['provincia_id' => $municipio31->id, 'nombre' => 'Boca Chica',]);
        Municipio::create(['provincia_id' => $municipio31->id, 'nombre' => 'Los Alcarrizos',]);
        Municipio::create(['provincia_id' => $municipio31->id, 'nombre' => 'Pedro Brand',]);
        Municipio::create(['provincia_id' => $municipio31->id, 'nombre' => 'San Antonio de Guerra',]);
        Municipio::create(['provincia_id' => $municipio31->id, 'nombre' => 'Santo Domingo Norte',]);
        Municipio::create(['provincia_id' => $municipio31->id, 'nombre' => 'Santo Domingo Oeste',]);

        $municipio32 =  DB::table('provincias')->where('nombre', 'Valverde')->first();
        Municipio::create(['provincia_id' => $municipio32->id, 'nombre' => 'Mao',]);
        Municipio::create(['provincia_id' => $municipio32->id, 'nombre' => 'Esperanza']);
        Municipio::create(['provincia_id' => $municipio32->id, 'nombre' => 'Laguna Salada']);
    }
}
