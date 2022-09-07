<?php
/** @var ViewErrorBag $errors */
/** @var Productos | Collection $producto */

use App\Models\Productos;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\ViewErrorBag;
?>
@extends('layouts.admin')
@section('title', 'Nuevo producto')
@section('main')
    <h1> Editar producto</h1>
    @if($errors->any())
        <div class="alert alert-danger" >
            Hay errores de validación en el formulario
        </div>
    @endif
    <form  action="{{ route('productos.editar.grabar',['id' => $producto->productos_id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nombre" class="form-label"> Nombre </label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                class="form-control @error('nombre')
                    is-invalid @enderror"
                @error('nombre')
                aria-describedby="error-nombre" @enderror
                value="{{old('nombre', $producto->nombre)}}"
            >
            @error('nombre')
            <div class="text-danger" id="error-nombre">
                {{$errors->first('nombre')}}
            </div>
            @enderror
        </div>

        <div>
            <label for="precio" class="form-label"> Precio </label>
            <input type="number" name="precio" id="precio"
                   class="form-control @error('precio')
                       is-invalid @enderror"
                   @error('precio')
                   aria-describedby="error-precio" @enderror
                   value="{{old('precio', $producto->precio)}}"
            >
            @error('precio')
            <div class="text-danger" id="error-precio">
                {{$errors->first('precio')}}
            </div>
            @enderror
        </div>
        <div>
            <label for="marca" class="form-label"> Marca </label>
            <input  type="text" name="marca" id="marca"
                    class="form-control @error('marca')
                        is-invalid @enderror"
                    @error('marca')
                    aria-describedby="error-marca" @enderror
                    value="{{old('marca', $producto->marca)}}"
            >

            @error('marca')
            <div class="text-danger" id="error-marca">
                {{$errors->first('marca')}}
            </div>
            @enderror
        </div>
        <div>
            <label for="cambio" class="form-label"> Cambio </label>
            <input  type="text" name="cambio" id="cambio"
                    class="form-control @error('cambio')
                        is-invalid @enderror"
                    @error('cambio')
                    aria-describedby="error-cambio" @enderror
                    value="{{old('cambio', $producto->cambio)}}"
            >
            @error('cambio')
            <div class="text-danger" id="error-cambio">
                {{$errors->first('cambio')}}
            </div>
            @enderror
        </div>
        <div>
            <label for="freno" class="form-label"> Freno </label>
            <input  type="text" name="freno" id="freno"
                    class="form-control @error('freno')
                        is-invalid @enderror"
                    @error('freno')
                    aria-describedby="error-freno" @enderror
                    value="{{old('freno', $producto->freno)}}"
            >

            @error('freno')
            <div class="text-danger" id="error-freno">
                {{$errors->first('freno')}}
            </div>
            @enderror
        </div>
        <div>
            <label for="descripcion" class="form-label"> Descripción </label>
            <textarea name="descripcion" id="descripcion"
                      class="form-control @error('descripcion')
                          is-invalid @enderror"
                      @error('descripcion')
                      aria-describedby="error-descripcion" @enderror
            >{{old('descripcion', $producto->descripcion)}}
            </textarea>

            @error('descripcion')
            <div class="text-danger" id="error-descripcion">
                {{$errors->first('descripcion')}}
            </div>
            @enderror
        </div>

        @if($producto->imagen != '' && file_exists(public_path('img/' . $producto->imagen)))
            <?php
            [$width, $height, $type, $attrs] = getimagesize(public_path('img/' . $producto->imagen));
            ?>
            <div class="my-3">
                <p>Imagen actual</p>
                <img src="{{ url('img/' . $producto->imagen) }}" alt="{{$producto->nombre}}">
            </div>
        @endif

        <div>
            <label for="imagen" class="form-label">Imagen (opcional) </label>
            <input type="file" id="imagen" name="imagen" class="form-control">
        </div>

        <a href="{{route('admin.productos')}}" class="btn btn-secondary my-5"> Cancelar </a>
        <button type="submit" class="btn btn-primary my-5 ms-5"> Actualizar </button>
    </form>
@endsection

