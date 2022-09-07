<?php
/**@var User[] | Collection $usuarios **/

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

?>

@extends('layouts.admin')
@section('title', 'Usuarios')
@section('main')
    <section class="container mb-5">
        <h1>Usuarios</h1>

        @if($usuarios->isNotEmpty())
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Tipo de Usuario</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>@if($usuario->admin)
                                Administrador
                            @else
                                Común
                            @endif
                        </td>
                        <td>
                            @if(!$usuario->admin)
                                <div class="text-center">
                                    <a class="btn btn-primary d-block" href="{{ route('admin.usuarios.ver', ['id'=>
                                    $usuario->id]) }}">Ver</a>

                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center mb-5">No hay ningún usuario para mostrar.</p>
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
