@extends('layouts.main')
@section('title', 'Contacto')
@section('main')
    <h1>Contacto</h1>
    <div class="row">
        <section class="col-md-6 row contacto me-2">
            <ul class="col-lg-6">
                <li>Consultas y compras</li>
                <li> <span>+54 011 4308-7589 </span></li>
                <li> <span>velobike@gmail.com </span></li>
                <li>Lunes a viernes 8 a 20 hs.</li>
            </ul>
            <ul class="col-lg-6">
                <li>Servicio y Garantía</li>
                <li> <span>+54 011 4938-8721</span> </li>
                <li> <span>servicio@velobike.com</span></li>
                <li>Lunes a viernes 8 a 20 hs.</li>
            </ul>
            <ul class="col-lg-12">
                <li>Dirección</li>
                <li> <span>Av. Juan B. Justo 900 (CABA)</span> </li>
                <li>Lunes a viernes 9 a 19 hs.</li>
            </ul>
        </section>
        <section class="col-md-6">
            <p>Si tenés una consulta, podes comunicarte por este formulario.</p>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="nombre" class="visually-hidden">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="visually-hidden">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required>
                </div>
                <div class="mb-3">
                    <label for="comentario" class="visually-hidden">Comentario</label>
                    <textarea name="comentario" cols="30" rows="4" id="comentario" placeholder="Comentario" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </section>
    </div>
    <section class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.9204656589673!2d-58.430869985196026!3d-34.58087896379613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb58fe3ff10c9%3A0x25bb6ee23a6402b3!2sAv.%20Juan%20B.%20Justo%20900%2C%20Buenos%20Aires!5e0!3m2!1ses!2sar!4v1632349801263!5m2!1ses!2sar" width="800" height="300"  allowfullscreen="" loading="lazy"></iframe>
    </section>
@endsection
