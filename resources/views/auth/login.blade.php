<?php
/** @var ViewErrorBag $errors */

use Illuminate\Support\ViewErrorBag;
?>
@extends('layouts.main')
@section('title', 'Iniciar sesión')
@section('main')
    <h1>Iniciar sesión</h1>
    <form  action="{{ route('login.grabar') }}" method="post">
        @csrf
        <div>
            <label for="email" class="form-label"> Email </label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="{{old('email')}}"
            >
        </div>

        <div>
            <label for="password" class="form-label"> Contraseña </label>
            <input type="password" name="password" id="password"
                   class="form-control"
                   value="{{old('password')}}"
            >
        </div>

        <button type="submit" class="btn btn-primary w-100 my-5"> Ingresar </button>
    </form>

@endsection
