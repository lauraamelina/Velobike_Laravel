<?php
/** @var ViewErrorBag $errors */

use Illuminate\Support\ViewErrorBag;
?>
@extends('layouts.main')
@section('title', 'Registro')
@section('main')
    <h1>Registro</h1>
    <form  action="{{ route('registro.grabar') }}" method="post">
        @csrf
        @if($errors->any())
            <div class="alert alert-danger" >
                Hay errores de validación en el formulario
            </div>
        @endif
        <div>
            <label for="name" class="form-label"> Nombre </label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control @error('name')
                    is-invalid @enderror"
                @error('name')
                aria-describedby="error-name" @enderror
                value="{{old('name')}}"
            >

            @error('name')
                <div class="text-danger" id="error-name">
                    {{$errors->first('name')}}
                </div>
            @enderror
        </div>
        <div>
            <label for="email" class="form-label"> Email </label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control @error('email')
                    is-invalid @enderror"
                @error('email')
                aria-describedby="error-email" @enderror
                value="{{old('email')}}"
            >

            @error('email')
                <div class="text-danger" id="error-email">
                    {{$errors->first('email')}}
                </div>
            @enderror
        </div>

        <div>
            <label for="password" class="form-label"> Contraseña </label>
            <input type="password" name="password" id="password"
                   class="form-control password @error('password')
                       is-invalid @enderror"
                   @error('password')
                   aria-describedby="error-password" @enderror
                   value="{{old('password')}}"
            >
            <span class="fa fa-fw fa-eye password-icon show-password" data-target="#password"></span>

            @error('password')
                <div class="text-danger" id="error-password">
                    {{$errors->first('password')}}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100 my-5"> Registrarme </button>
    </form>
    <script>
        window.addEventListener("load", function() {
            let showPassword = document.querySelector('.show-password');
            showPassword.addEventListener('click', () => {
                let password = document.querySelector('.password');

                if ( password.type === "text" ) {
                    password.type = "password"
                    showPassword.classList.remove('fa-eye-slash');
                } else {
                    password.type = "text"
                    showPassword.classList.toggle("fa-eye-slash");
                }

            })

        });
    </script>
@endsection
