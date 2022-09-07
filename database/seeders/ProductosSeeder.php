<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('productos')->insert([
           [
               'productos_id' => 1,
               'nombre'=>"Bicicleta Motomel",
               'precio'=>10000,
               'marca'=>'Maxam',
               'cambio'=>'Shimano Acera',
               'freno'=> 'Disco hidráulico',
               'descripcion'=>'Las montañas, senderos o asfalto son su hábitat natural. La horquilla con bloqueo y regulación te hará disfrutar de cada piso y te dará la seguridad que necesitas para disfrutar sin preocuparte del suelo que transites',
               'imagen' => 'bici-motomel-maxam.png',
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),

           ],
            [
                'productos_id' => 2,
                'nombre'=>"Bike Sunshine ",
                'precio'=>90000,
                'marca'=>'Termal',
                'cambio'=>'Shimano Alivio',
                'freno'=> 'Disco hidráulico shimano',
                'descripcion'=>' Bike Sunshine suma lo mejor de la línea recreativa con detalles técnicos y estéticos únicos en el mercado. Su frente completamente pulido y el diseño de su cuadro le dan estilo a un producto eficiente por naturaleza. ',
                'imagen' => 'bici-mtb-termal-sunshine.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),


            ],
           [
               'productos_id' => 3,
               'nombre'=>"Bicicleta de paseo",
               'precio'=>80000,
               'marca'=>'Stark',
               'cambio'=>'Shimano Altus ',
               'freno'=> 'Disco mecánico',
               'descripcion'=> 'Esta bicicleta está preparada para agregarle alforjas traseras y delanteras. La versátil geometría del cuadro permite gran maniobrabilidad y a la vez comodidad para moverse en el tránsito de la ciudad o en largos recorridos',
               'imagen' => 'bici-raleigh-urbana.png',
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),


           ],
            [
                'productos_id' => 4,
                'nombre'=>"Bicicleta Zest Spirit",
                'precio'=>40000,
                'marca'=>'Rbl',
                'cambio'=>'Shimano Nexus, 3 velocidades',
                'freno'=> 'Shimano Nexus',
                'descripcion'=>' Combina estilo con seguridad de conducción. Incorpora cubiertas de banda reflectiva, frenos roller que no requieren mantenimiento, canasto y cambios sencillos de usar para moverte cómodamente por la ciudad',
                'imagen' => 'bici-zest-spirit.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'productos_id' => 5,
                'nombre'=>"Bicicleta Atix M Sram",
                'precio'=>10000,
                'marca'=>'Venzo',
                'cambio'=>'Shimano Acera',
                'freno'=> 'Disco hidráulico',
                'descripcion'=>' Las montañas, senderos o asfalto son su hábitat natural. La horquilla con bloqueo y regulación te hará disfrutar de cada piso y te dará la seguridad que necesitas para disfrutar sin preocuparte del suelo que transites.',
                'imagen' => 'bici-atix-sram.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'productos_id' => 6,
                'nombre'=>"Bicicleta Skyline Evo",
                'precio'=>20000,
                'marca'=>'Teknial',
                'cambio'=>'SUNRUN RD-HD-04A',
                'freno'=> 'Disco mecánico',
                'descripcion'=>' Con su nuevo diseño seguí sumando kilómetros de adrenalina.',
                'imagen' => 'bici-skyline.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'productos_id' => 7,
                'nombre'=>"Bicicleta Pigeon",
                'precio'=>90000,
                'marca'=>'Teknial',
                'cambio'=>'Shimano Tiagra',
                'freno'=> 'PROMAX RC462',
                'descripcion'=>' El cuadro de fibra de carbono sumado al equipamiento con el que diseñamos a la Pigeon, son la combinación perfecta para quienes hacen largas distancias y necesitan que la bici les haga la tarea más placentera.',
                'imagen' => 'bici-pigeon.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'productos_id' => 8,
                'nombre'=>"Bicicleta Pixel",
                'precio'=>70000,
                'marca'=>'Teknial',
                'cambio'=>'No',
                'freno'=> 'V-Brake',
                'descripcion'=>'El sueño de los niños se hizo realidad: tener la libertad de ir a donde quiera arriba de una bici. Dejalo afrontar sus propias aventuras con una bici resistente, sencilla de manejar y apropiada en tamaño y proporción. ',
                'imagen' => 'bici-pixel.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'productos_id' => 9,
                'nombre'=>"Bicicleta Logik",
                'precio'=>50000,
                'marca'=>'Teknial',
                'cambio'=>'Shimano Nexus, 3 velocidades',
                'freno'=> 'Shimano Nexus',
                'descripcion'=>' La bicicleta plegable ideal para ir al trabajo que se adapta a todos los espacios y lugares a los que quieras llevarla. Se pliega de manera sencilla e incorpora cambios y ajustes de sillín',
                'imagen' => 'bici-logik.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],

        ]);
    }
}
