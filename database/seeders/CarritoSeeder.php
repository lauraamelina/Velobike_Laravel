<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('carrito')->insert([
        [
            'carrito_id' => 1,
            'productos_id' => 2,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]

    ]);
    }
}
