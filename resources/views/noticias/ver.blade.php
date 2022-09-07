<?php
/**@var Noticia[] | Collection $noticia **/

use App\Models\Noticia;
use Illuminate\Database\Eloquent\Collection;
?>
@extends('layouts.main')
@section('title', 'Ver noticia')
@section('main')
    <h1 class="visually-hidden">Detalle de cada noticia</h1>
    <section class="container">
        <div class="row" >
            <h2> {{ $noticia->titulo }}</h2>
            <div class="col-md-7">
                <p class="fw-bold">Fecha de publicación: {{  $noticia->fecha->format(__('dates.format')) }}</p>

                @forelse($noticia->categorias as $categoria)
                    <span class="badge bg-secondary my-1">{{ $categoria->nombre }}</span>
                @empty
                    No hay categorías.
                @endforelse

                <p>{!! nl2br($noticia->texto)!!} </p>
                <a href="{{url('noticias/index')}}" class="btn btn-secondary my-5">Volver</a>
            </div>

            @if($noticia->imagen != '' && file_exists(public_path('img/' . $noticia->imagen)))
                <?php
                [$width, $height, $type, $attrs] = getimagesize(public_path('img/' . $noticia->imagen));
                ?>
                    <div class="my-5 col-md-5">
                        <img src={{ url('img/' . $noticia->imagen) }} alt="{{ $noticia->titulo }}">
                    </div>
            @endif

        </div>
    </section>
    <script src="../js/bootstrap.bundle.min.js"></script>
@endsection
