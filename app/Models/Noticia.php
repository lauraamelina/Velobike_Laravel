<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = "noticias";
    protected $primaryKey = 'noticia_id';
    protected $fillable = ['noticia_id','titulo', 'fecha', 'resumen', 'texto', 'imagen'];

    public static $rules = [
        'titulo' => 'required',
        'fecha' => 'required',
        'resumen'=>'required|max:300',
        'texto'=>'required',
    ];

    public static $rulesMessage = [
        'titulo.required' => 'Tenés que escribir un título para la noticia.',
        'fecha.required' => 'La noticia debe tener una fecha',
        'resumen.required' => 'La noticia debe tener un resumen',
        'resumen.max' => 'El resumen no debe tener más de :max caracteres',
        'texto.required' => 'La noticia debe tener un texto o descripción',

    ];

    protected $casts = [
        'fecha' => 'date:d/m/Y',
    ];


    public function categorias()
    {

        return $this->belongsToMany(
            Categoria::class,
            'noticias_tienen_categorias',
            'noticia_id',
            'categoria_id',
            'noticia_id',
            'categoria_id',
        );
    }

}
