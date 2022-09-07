<?php
/**@var Carrito[] | Collection $carrito **/
/**@var \MercadoPago\Preference $preference */
/**@var int $total **/

use App\Models\Carrito;
use Illuminate\Database\Eloquent\Collection;

//echo '<pre>';
//print_r($data);
//echo '</pre>';
?>
@extends('layouts.main')
@section('title', 'Ver carrito')
@section('main')
    <h1>Carrito de compras</h1>
    <section class="detalle-producto container">
        @if($carrito->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach($carrito as $item)
                    <tbody>
                        <tr>
                            <td>{{$item->nombre}}</td>
                            <td>$ {{$item->precio}}</td>
                            <td>
                                <div class="text-center">
                                    <form class="my-1 d-inline-block boton-eliminar" method="post" action="{{route
                                    ('carrito.eliminar', ['id' => $item->carrito_id])}}">
                                        @csrf
                                        <button class="btn btn-danger show-alert-delete-box" type="submit"> Eliminar </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <div class="d-flex flex-column mt-5">
                <p class="ms-auto h4">Total: ${{$total}}</p>
                <div class="d-flex my-5">
                    <a class="btn btn-secondary me-auto" href="{{route('carrito.vaciar')}}"> Vaciar </a>
                    <a class="btn btn-primary ms-auto" href="{{route('carrito.comprar')}}"> Comprar </a>
                </div>
            </div>
        @else
            <div class="text-center">
                <p class="my-5"> El carrito de compras está vacío</p>
                <a href="{{route('productos.index')}}" class="btn btn-primary">Ver productos</a>
            </div>
        @endif
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $('.show-alert-delete-box').click(function(event){
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "¿Estas seguro de que querés eliminar este ítem?",
                text: "Una vez eliminado no se va a poder recuperar",
                icon: "warning",
                type: "warning",
                buttons: ["Cancelar","Eliminar"],
                confirmButtonColor: '#ff8000',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection

