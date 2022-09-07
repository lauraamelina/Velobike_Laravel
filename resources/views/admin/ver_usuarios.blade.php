<?php
/**@var User[] | Collection $usuario **/
/**@var Compras[] | Collection $compras **/
/**@var Productos[] | Collection $productos **/


use App\Models\Compras;
use App\Models\Productos;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
?>
@extends('layouts.admin')
@section('title', 'Ver usuario')
@section('main')
    <h1 class="visually-hidden">Detalle de cada usuario</h1>
    <section class="detalle-producto container">
        <div class="row" >
            <div class="col-md-12">
                <div class="d-flex">
                    <div class="order-1">
                        <h2> {{ $usuario->name }}  </h2>
                        <p>  {{ $usuario->email }} </p>
                    </div>
                    <div class="imagen-usuario me-5 order-0">
                        <img src="{{ url('img/' . $usuario->foto) }}" alt="{{ $usuario->name }}">
                    </div>
                </div>
                <div>
                    @if($compras->isNotEmpty())
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Total</th>
                                <th>Fecha</th>
                            </tr>
                            </thead>
                            @foreach($compras as $item)
                                <tbody>
                                <tr>
                                    <td>
                                        @foreach($productos as $producto)
                                            @if($item->productos_id === $producto->productos_id)
                                                {{$producto->nombre}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>$ {{$item->precio}}</td>
                                    <td>{{$item->created_at->format(__('dates.format'))}}</td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    @else
                        <p class="text-center"> Todavía no tiene compras realizadas</p>
                    @endif
                </div>
                <a href="{{url('admin/usuarios')}}" class="btn btn-secondary mt-5">Volver</a>
            </div>
        </div>
    </section>
@endsection

