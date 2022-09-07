<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('compras')->insert([
           [
               'compra_id'  => 1,
               'user_id'    => 1,
               'productos_id'  => 1,
               'precio'     => 900,
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),

           ],

            [
                'compra_id'  => 2,
                'user_id'    => 2,
                'productos_id'  => 2,
                'precio'     => 500,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'compra_id'  => 3,
                'user_id'    => 3,
                'productos_id'  => 3,
                'precio'     => 500,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'compra_id'  => 4,
                'user_id'    => 4,
                'productos_id'  => 3,
                'precio'     => 500,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
