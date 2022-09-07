<?php
/**@var Productos[] | Collection $producto **/
use App\Models\Productos;
use Illuminate\Database\Eloquent\Collection;
?>
@extends('layouts.main')
@section('title', 'Detalle producto')
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
                <div class="d-flex pe-5">

                    <a href="{{url('productos/index')}}" class="btn btn-secondary me-auto">Volver</a>

                    @auth
                        <form action="{{ route('productos.agregarCarrito') }}" method="POST" class="ms-auto">
                            @csrf
                            <input type="hidden" name="productos_id" id="productos_id_{{ $producto->productos_id }}"
                                   value="{{$producto->productos_id}}">
                            <input type="hidden" name="user_id" id="user_id_{{auth()->user()->id}}" value="{{ auth()->user()
                    ->id}}">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                            </div>
                        </form>
                    @endauth
                </div>
            </div>
            <div class="imagen-producto col-md-5">
                <img src="{{ url('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
            </div>
        </div>
    </section>
    <script src="../js/bootstrap.bundle.min.js"></script>
@endsection

