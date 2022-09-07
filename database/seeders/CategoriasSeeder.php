<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            [
                'categoria_id'=> 1,
                'nombre'=>"Deporte"

            ],
            [
                'categoria_id'=> 2,
                'nombre'=>"Turismo"
            ],
            [
                'categoria_id'=> 3,
                'nombre'=>"Carreras"
            ],
            [
                'categoria_id'=> 4,
                'nombre'=>"Ciclismo"
            ],
            [
                'categoria_id'=> 5,
                'nombre'=>"Tour de Francia"
            ],
            [
                'categoria_id'=> 6,
                'nombre'=>"Bicicletas"
            ]
        ]);
    }
}
