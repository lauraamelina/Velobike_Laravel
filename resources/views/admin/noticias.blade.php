<?php
/**@var Noticia[] | Collection $noticias **/
use App\Models\Noticia;
use Illuminate\Database\Eloquent\Collection;
?>

@extends('layouts.admin')
@section('title', 'Noticias')
@section('main')
    <section class="container">
        <h1>Administración de Noticias</h1>
        <a class="btn btn-primary mb-3 mt-3" href="{{url('noticias/nueva')}}"> Agregar Noticia</a>
        @if($noticias->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Fecha</th>
                        <th>Categorías</th>
                        <th>Resumen</th>
                        <th>Texto</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($noticias as $noticia)
                    <tr>
                        <td>{{$noticia->noticia_id}}</td>
                        <td>{{$noticia->titulo}}</td>
                        <td>{{ $noticia->fecha->format(__('dates.format'))}} </td>
                        <td>
                            @forelse($noticia->categorias as $categoria)
                                <span class="badge bg-secondary my-1">{{ $categoria->nombre }}</span>
                            @empty
                                No hay categorías.
                            @endforelse
                        </td>
                        <td class="maximo"> <div>{{$noticia->resumen}}</div></td>
                        <td class="maximo"><div>{{$noticia->texto}}</div></td>
                        <td>
                            <div class="text-center">
                                <a class="btn btn-primary my-1 d-block" href="{{ route('admin.noticias.ver', ['id' => $noticia->noticia_id]) }}">Ver</a>
                                <a class="btn btn-secondary my-1 d-block" href="{{route('noticias.editar', ['id' => $noticia->noticia_id])}}">Editar </a>
                                <form class="my-1 d-inline-block boton-eliminar" method="post" action="{{route('noticias.eliminar', ['id' => $noticia->noticia_id])}}">
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
            <p class="text-center mb-5">No hay ninguna noticia para mostrar.</p>
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
                title: "¿Estas seguro que querés eliminar esta noticia?",
                text: "Una vez eliminada no se va a poder recuperar",
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
