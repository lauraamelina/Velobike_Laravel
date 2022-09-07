<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UsersSeeder::class);
        $this->call(ProductosSeeder::class);
        $this->call(NoticiasSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(NoticiasTienenCategorias::class);
        $this->call(ComprasSeeder::class);
        $this->call(CarritoSeeder::class);





    }
}
