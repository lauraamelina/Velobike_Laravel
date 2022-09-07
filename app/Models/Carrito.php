<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';
    protected $primaryKey = 'carrito_id';
    protected $fillable = ['productos_id', 'user_id'];

    protected function precio() :Attribute
    {
        return Attribute::make(
            get:fn ($value) => ($value / 100),
            set:fn ($value) => ($value * 100),
        );
    }

}
