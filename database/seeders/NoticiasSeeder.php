<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('noticias')->insert([
            [
                'noticia_id' => 1,
                'titulo'=>"Las bicicletas vuelven a las calles empujadas por la pandemia",
                'fecha'=>'2020-10-01',
                'resumen' => 'En 2020, se batieron todos los récords con más de 1,5 millones de bicicletas vendidas (casi el doble que automóviles)
                 El Ministerio de Transportes va a presentar de forma "inminente" la Estrategia estatal de la bicicleta',
                'texto' => 'La pandemia de coronavirus ha supuesto un punto de inflexión para la bicicleta, el año pasado se vendieron casi el doble de bicis que coches, y más de 700.000 personas la han incorporado a sus desplazamientos cotidianos, una cifra que podría crecer de forma exponencial ya que 2,3 millones están dispuestas a usarla en los próximos doce meses, según un estudio de la Red de Ciudades por la Bicicleta.

                Este jueves se celebra el Día Mundial de la Bicicleta, un medio de transporte que la preocupación por el cambio climático y la salud ha devuelto poco a poco a las calles de las ciudades españolas y del resto del planeta. La ONU eligió esta fecha en 2018 y en esta jornada y en los próximos días se han convocado bicicletadas para pedir más seguridad a la hora de circular sobre dos ruedas.

                La coordinadora de Conbici, Laura Vergara, asegura a RTVE.es que "la bicicleta es una aliada en la crisis sanitaria, parte de la solución en la crisis ambiental y tiene un gran potencial en la crisis socioeconómica". Añade que España "está haciendo un buen trabajo" y que la bicicleta forma parte del plan de recuperación que el Gobierno ha presentado a la Comisión Europea.',
                'imagen' => 'news-bicis-pandemia.jpeg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),


            ],
            [
                'noticia_id' => 2,
                'titulo'=>"Algunas de las mejores marcas de patinetes eléctricos y bicicletas",
                'fecha'=>'2021-09-09',
                'resumen' => 'Muchas personas apuestan por adquirir patinetes y bicicletas eléctricas para desplazarse, ya que la movilidad sostenible es una necesidad para frenar los efectos del cambio climático.',
                'texto' => 'El equipo de Urbing, un local ubicado en el barrio de Villa Crespo, trabaja combinando productos de calidad con un diseño atractivo, de alta fiabilidad, seguridad y buenas prestaciones, elementos que caracterizan al servicio de la empresa. Por ello, abrieron recientemente su sitio web para brindar una atención personalizada y que cada cliente descubra el vehículo sostenible ideal para sus necesidades.

                Entre las marcas de bicicletas eléctricas disponibles se encuentran Inokim, E-broh, Moustache, Carmela, Gocycle y Flebi, famosa por su característica plegable, lo que entrega un diseño compacto fácil de llevar. Lo que tienen en común las marcas es su deseo de brindar simplicidad y funcionalidad con bicicletas preparadas para el máximo rendimiento.

                En el caso de la marca Inokim, se trata de un proyecto que empezó en 2009 con el objetivo de encontrar soluciones para desplazarse por las ciudades en el menor tiempo posible y sin esfuerzo. Para reducir el  impacto ambiental, los patinetes son una excelente opción para adultos, ya que aseguran la seguridad, comodidad y fiabilidad necesaria.
                ',
                'imagen' => 'news-bicis-electronicas.jpeg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],

        ]);
    }
}
