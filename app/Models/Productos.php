<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = "productos";
    protected $primaryKey = 'productos_id';
    protected $fillable = ['nombre', 'precio', 'marca', 'freno', 'cambio', 'descripcion', 'imagen'];

    public static array $rules = [
        'nombre' => 'required',
        'precio' => 'required',
        'marca'=>'required',
        'freno'=>'required',
        'cambio'=>'required',
        'descripcion'=>'required',
    ];

    public static array $rulesMessage = [
        'nombre.required' => 'Tenés que escribir un nombre para el producto.',
        'precio.required' => 'El producto tiene que tener un precio',
        'marca.required' => 'El producto tiene que tener una marca',
        'freno.required' => 'El producto tiene que tener un freno',
        'cambio.required' => 'El producto tiene que tener un cambio',
        'descripcion.required' => 'El producto tiene que tener una descripción ',
    ];

    protected function precio() :Attribute
    {
        return Attribute::make(
            get:fn ($value) => ($value / 100),
            set:fn ($value) => ($value * 100),
        );
    }


}
