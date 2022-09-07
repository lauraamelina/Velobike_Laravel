<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@velobike.com',
                'password'=> Hash::make('1234'),
                'admin'=> true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Laura Melina Lopez',
                'email' => 'lauraamelina@gmail.com',
                'password'=> Hash::make('1234'),
                'admin'=> false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Santiago Gallino',
                'email' => 'santiago@gmail.com',
                'password'=> Hash::make('1234'),
                'admin'=> false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Mica',
                'email' => 'mica.georgi@gmail.com',
                'password'=> Hash::make('1234'),
                'admin'=> false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
