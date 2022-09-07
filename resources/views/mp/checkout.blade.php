<?php
/** @var MercadoPago\Preference $preference */
/** @var string $mpPublicKey */
/** @var int $total */

?>
@extends('layouts.main')
@section('title', 'Pasarela de Pago')
@section('main')
    <section class="container">
        <h1 class="mb-4 text-center">Pasarela de pago</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($preference->items as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>$ {{$item->unit_price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex my-5">
            <p class="h3 ms-auto d-block">Total: ${{$total}}</p>
            <div class="mp-container ms-auto"></div>
        </div>

        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script>
            // Agrega credenciales de SDK
            const mp = new MercadoPago("<?= $mpPublicKey;?>", {
                locale: "es-AR",
            });

            // Inicializa el checkout
            mp.checkout({
                preference: {
                    id: "<?= $preference->id;?>",
                },
                render: {
                    container: ".mp-container", // Indica el nombre de la clase donde se mostrará el botón de pago
                    label: "Pagar", // Cambia el texto del botón de pago (opcional)
                },
            });
        </script>
        <script src="../../public/js/bootstrap.bundle.min.js"></script>
    </section>
@endsection
