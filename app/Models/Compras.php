<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'compra_id';
    protected $fillable = ['user_id', 'productos_id', 'precio'];

}
