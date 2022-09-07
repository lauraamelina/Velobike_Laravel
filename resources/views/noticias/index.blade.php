<?php
/**@var Noticia[] | Collection $noticias **/
use App\Models\Noticia;
use Illuminate\Database\Eloquent\Collection;
?>
@extends('layouts.main')
@section('title', 'Noticias')
@section('main')
    <section class="container">
    <h1>Noticias</h1>
        @if($noticias->isNotEmpty())
            <p>Conocé todas las noticias sobre el ciclismo</p>
            @foreach($noticias as $noticia)
                <article class="card row">
                    <div class="card-header">
                        <p class="mb-0"> Publicado: <strong>{{ $noticia->fecha->format(__('dates.format'))}}</strong></p>
                    </div>
                    <div class="card-body col-md-7">
                        <h2 class="card-title h4">{{$noticia->titulo}}</h2>
                        @forelse($noticia->categorias as $categoria)
                            <span class="badge bg-secondary my-1">{{ $categoria->nombre }}</span>
                        @empty
                            <p>Sin categorías</p>
                        @endforelse
                        <p class="card-text">{{$noticia->resumen}}</p>
                        <a class="btn btn-primary" href="{{ route('noticias.ver', ['id' => $noticia->noticia_id]) }}">Ver más</a>
                    </div>
                    @if($noticia->imagen != '' && file_exists(public_path('img/' . $noticia->imagen)))
                        @php
                        [$width, $height, $type, $attrs] = getimagesize(public_path('img/' . $noticia->imagen));
                        @endphp
                        <div class="col-md-5 mb-3">
                            <img src="{{ url('img/' . $noticia->imagen) }}" alt="{{$noticia->nombre}}" {!! $attrs !!}>
                        </div>
                    @endif
                </article>
            @endforeach
            {{$noticias->links()}}
        @else
            <p class="text-center mb-5">No hay ninguna noticia para mostrar </p>
        @endif

    </section>
    <script src="../js/bootstrap.bundle.min.js"></script>
@endsection
