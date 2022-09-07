@extends('layouts.main')
@section('title', 'Pago pendiente')
@section('main')
    <section class="container text-center my-5">
        <h1 class="mb-4 text-center">Pago pendiente</h1>
        <p>Por el momento el pago está pendiente, te pedimos que cuando el pago se procese, entres a verificarlo en
            "Mis Compras"</p>
        <a class="btn btn-primary" href="{{route('carrito.compras')}}">Ver compras</a>

        <script src="../../public/js/bootstrap.bundle.min.js"></script>
    </section>
@endsection
