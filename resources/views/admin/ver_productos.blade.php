<?php
/**@var Productos[] | Collection $producto **/

use App\Models\Productos;
use Illuminate\Database\Eloquent\Collection;
?>
@extends('layouts.admin')
@section('title', 'Ver producto')
@section('main')
    <h1 class="visually-hidden">Detalle de cada producto</h1>
    <section class="detalle-producto container">
        <div class="row" >
            <div class="col-md-7">
                <h2> {{ $producto->nombre }}</h2>
                <p>{{ $producto->descripcion }}</p>
                <ul>
                    <li><span>Marca:</span> {{ $producto->marca }}</li>
                    <li><span>Cambio:</span> {{ $producto->cambio }}</li>
                    <li><span>Freno:</span> {{ $producto->freno }} </li>
                </ul>
                <p> <span class="precio"> $ {{ $producto->precio }}</span> </p>
                <a href="{{url('admin/productos')}}" class="btn btn-secondary ">Volver</a>
            </div>
            <div class="imagen-producto col-md-5">
                <img src="{{ url('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
            </div>
        </div>
    </section>
@endsection

