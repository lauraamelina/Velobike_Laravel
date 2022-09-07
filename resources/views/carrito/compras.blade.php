<?php
/**@var Compras[] | Collection $compras **/
/**@var Productos[] | Collection $productos **/

use App\Models\Compras;
use App\Models\Productos;
use Illuminate\Database\Eloquent\Collection;

?>

@extends('layouts.main')
@section('title', 'Compras')
@section('main')
    <h1 class="my-5">Mis compras</h1>
    <section class="detalle-producto container my-5">
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
            <div class="margen">
                <p class="text-center"> Todavía no tenés compras realizadas</p>
            </div>
        @endif
    </section>
@endsection

