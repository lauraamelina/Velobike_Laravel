@extends('layouts.main')
@section('title', 'Compra realizada')
@section('main')
    <section class="compra-exito text-center">
        <h1>Compra realizada con éxito</h1>
        <p>Pronto te estaremos contactando para entregarte el pedido</p>
        <a href="{{route('productos.index')}}" class="btn btn-primary">Seguir comprando</a>
    </section>
    <script src="../../public/js/bootstrap.bundle.min.js"></script>
@endsection

