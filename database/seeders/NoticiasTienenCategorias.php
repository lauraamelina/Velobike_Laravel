<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticiasTienenCategorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('noticias_tienen_categorias')->insert([
            [
                'noticia_id' => 1,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noticia_id' => 2,
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
