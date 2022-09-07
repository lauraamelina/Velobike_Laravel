<?php
/** @var ViewErrorBag $errors */
/** @var Categoria[]|Collection $categorias */

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\ViewErrorBag;
?>
@extends('layouts.admin')
@section('title', 'Nueva noticia')
@section('main')
    <h1>Crear nueva noticia</h1>
    @if($errors->any())
        <div class="alert alert-danger" >
            Hay errores de validación en el formulario
        </div>
    @endif
    <form  action="{{ route('noticias.nueva.grabar') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="titulo" class="form-label"> Titulo </label>
            <input
                type="text"
                id="titulo"
                name="titulo"
                class="form-control @error('titulo')
                    is-invalid @enderror"
                @error('titulo')
                aria-describedby="error-titulo" @enderror
                value="{{old('titulo')}}"
            >
            @error('titulo')
            <div class="text-danger" id="error-titulo">
                {{$errors->first('titulo')}}
            </div>
            @enderror
        </div>

        <div>
            <label for="fecha" class="form-label"> Fecha </label>
            <input type="date" name="fecha" id="fecha"
                   min="{{Carbon\Carbon::now()->format('Y-m-d')}}"
                   class="form-control @error('fecha')
                       is-invalid @enderror"
                   @error('fecha')
                    aria-describedby="error-fecha"
                   @enderror
                   value="{{old('fecha', Carbon\Carbon::now()->format('Y-m-d'))}}"
            >


            @error('fecha')
            <div class="text-danger" id="error-fecha">
                {{$errors->first('fecha')}}
            </div>
            @enderror

        </div>
        <div>
            <label for="resumen" class="form-label"> Resumen </label>
            <div class="text-secondary" id="validacion-resumen" >
                El resumen no debe tener más de 300 caracteres
            </div>
            <textarea name="resumen" id="resumen"
                   class="form-control @error('resumen')
                        is-invalid @enderror"
                   @error('resumen')
                   aria-describedby="error-resumen validacion-resumen" @enderror

            >{{old('resumen')}}</textarea>

            @error('resumen')
            <div class="text-danger" id="error-resumen">
                {{$errors->first('resumen')}}
            </div>
            @enderror
        </div>
        <div>
            <label for="texto" class="form-label"> Texto </label>
            <textarea name="texto" id="texto"
                   class="form-control @error('texto')
                       is-invalid @enderror"
                   @error('texto')
                   aria-describedby="error-texto" @enderror
            >{{old('texto')}}</textarea>
            @error('texto')
            <div class="text-danger" id="error-texto">
                {{$errors->first('texto')}}
            </div>
            @enderror
        </div>

        <fieldset class="my-3">
            <legend class="form-legend">Categorías</legend>

            @foreach($categorias as $categoria)
                <div class="form-check form-check-inline">
                    <input
                        type="checkbox"
                        name="categoria_id[]"
                        id="categoria_id-{{ $categoria->categoria_id }}"
                        value="{{ $categoria->categoria_id }}"
                        class="form-check-input"
                        @checked(in_array($categoria->categoria_id, old('categoria_id', [])))
                    >
                    <label
                        for="categoria_id-{{ $categoria->categoria_id }}"
                        class="form-check-label"
                    >
                        {{ $categoria->nombre }}
                    </label>
                </div>
            @endforeach
        </fieldset>

        <div>
            <label for="imagen" class="form-label">Imagen (opcional) </label>
            <input type="file" id="imagen" name="imagen" class="form-control">
        </div>

        <a href="{{route('admin.noticias')}}" class="btn btn-secondary my-5"> Cancelar </a>
        <button type="submit" class="btn btn-primary my-5 ms-5"> Agregar </button>
    </form>
@endsection

