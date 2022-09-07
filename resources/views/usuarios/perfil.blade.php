<?php
/** @var User[]|Collection $usuario */
/** @var Carrito $carrito */
use App\Models\Carrito;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
?>
@extends('layouts.main')
@section('title', 'Mi perfil')
@section('main')
    <section>
        <h1>Mi perfil</h1>
        @if($errors->any())
            <div class="alert alert-danger" >
                @error('email')
                <div class="text-danger">
                    {{$errors->first('email')}}
                </div>
                @enderror

                @error('name')
                <div class="text-danger">
                    {{$errors->first('name')}}
                </div>
                @enderror

                @error('foto')
                <div class="text-danger">
                    {{$errors->first('foto')}}
                </div>
                @enderror
            </div>
        @endif
        <section class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="h5">Correo: <span> {{$usuario->email}} </span> </p>
                    <p class="h5">Nombre: <span> {{$usuario->name}} </span> </p>
                </div>
                @if($usuario->foto != '' && file_exists(public_path('img/' . $usuario->foto)))
                    <?php
                    [$width, $height, $type, $attrs] = getimagesize(public_path('img/' . $usuario->foto));
                    ?>
                    <div class="mb-3 foto-perfil col-md-4">
                        <p class="visually-hidden">Foto de perfil</p>
                        <img src="{{ url('img/' . $usuario->foto) }}" alt="{{$usuario->name}}">
                    </div>
                @endif
            </div>
        </section>
        <button type="button" class="btn btn-primary my-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Editar perfil
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('grabar.perfil') }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar mi peril</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="email" class="form-label"> Email </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control form-control-sm
                                    @error('email')
                                        is-invalid
                                    @enderror"
                                    @error('email')
                                        aria-describedby="error-email"
                                    @enderror
                                    value="{{old('email', $usuario->email)}}"
                                >

                                @error('email')
                                    <div class="text-danger" id="error-email">
                                        {{$errors->first('email')}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label"> Nombre </label>
                                <input type="text"
                                       name="name"
                                       id="name"
                                       class="form-control form-control-sm
                                       @error('name')
                                           is-invalid
                                       @enderror"
                                       @error('name')
                                            aria-describedby="error-name"
                                       @enderror
                                       value="{{old('name', $usuario->name)}}"
                                >

                                @error('name')
                                <div class="text-danger" id="error-name">
                                    {{$errors->first('name')}}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <label for="foto" class="form-label"> Cambiar foto de perfil </label>
                                <input
                                    type="file"
                                    id="foto"
                                    name="foto"
                                    class="form-control
                                    @error('foto')
                                        is-invalid
                                    @enderror"
                                    @error('foto')
                                    aria-describedby="error-foto"
                                    @enderror

                                    >

                                @error('foto')
                                <div class="text-danger" id="error-foto">
                                    {{$errors->first('foto')}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="../js/bootstrap.bundle.min.js"></script>
@endsection

