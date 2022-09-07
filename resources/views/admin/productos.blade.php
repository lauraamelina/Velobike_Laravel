<?php
/**@var Productos[] | Collection $productos **/

use App\Models\Productos;
use Illuminate\Database\Eloquent\Collection;
?>

@extends('layouts.admin')
@section('title', 'Productos')
@section('main')
    <section class="container">
        <h1>Administración de Productos</h1>
        <a class="btn btn-primary mb-3 mt-3" href="{{url('productos/nuevo')}}"> Agregar Producto</a>

        @if($productos->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Marca</th>
                        <th>Cambio</th>
                        <th>Freno</th>
                        <th>Descripción</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{$producto->productos_id}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->precio}}</td>
                        <td>{{$producto->marca}}</td>
                        <td>{{$producto->cambio}}</td>
                        <td>{{$producto->freno}}</td>
                        <td class="maximo"> <div>{{$producto->descripcion}}</div></td>
                        <td>
                            <div class="text-center">
                                <a class="btn btn-primary my-1 d-block" href="{{ route('admin.productos.ver', ['id' => $producto->productos_id]) }}">Ver</a>
                                <a class="btn btn-secondary my-1 d-block" href="{{route('productos.editar', ['id' => $producto->productos_id])}}">Editar </a>
                                <form class="my-1 d-inline-block boton-eliminar" method="post" action="{{route('productos.eliminar', ['id' => $producto->productos_id])}}">
                                    @csrf
                                    <button class="btn btn-danger show-alert-delete-box" type="submit"> Eliminar </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center mb-5">No hay ningún producto para mostrar.</p>
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
                title: "¿Estas seguro que querés eliminar este producto?",
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
