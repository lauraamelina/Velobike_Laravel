@extends('layouts.main')
@section('title', 'Error en el pago')
@section('main')
    <section class="container text-center my-5">
        <h1 class="mb-4 text-center">Error en el pago</h1>
        <p>Al paracer hubo un error en el pago, te pedimos que por favor vuelvas a ingresar para pagar</p>
        <a class="btn btn-primary" href="{{route('carrito')}}">Ver carrito</a>

        <script src="../../public/js/bootstrap.bundle.min.js"></script>
    </section>
@endsection
