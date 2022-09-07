@extends('layouts.main')
@section('title', 'Inicio')
@section('main')
    <section class="home">
        <h1 class="visually-hidden">Página Principal</h1>
        <p class="visually-hidden"> Tu vida en movimiento </p>
    </section>
    <section class="presentacion container">
        <h2>Bienvenido a <span>VELOBIKE</span> </h2>
        <p>Somos una empresa familiar que hace ya varios años nos especializamos en vender y arreglar bicicletas, nuestra                   filosofía es la salud, y siempre hemos apoyado los buenos hábitos como lo son andar en bicicleta al aire libre,                 correr, etc. Te invitamos a conocer nuestra página web para saber aún mas de nosotros.</p>
    </section>
    <section class="categorias container">
        <h2>Categorías</h2>
        <div class="row justify-content-center">
            <div class="col-md-3 col-5">
                <p class="visually-hidden">Bicicleta de Montaña (mountain bike)</p>
                <img src="img/bicicleta-de-montania.jpg" alt="Bicicleta de montaña">
            </div>
            <div class="col-md-3 col-5">
                <p class="visually-hidden">Bicicleta Plegable</p>
                <img src="img/bicicleta-pegable.jpg" alt="Bicicleta Pegable">
            </div>
            <div class="col-md-3 col-5">
                <p class="visually-hidden">Bicicletas Híbridas</p>
                <img src="img/bicicleta-hibrida.jpg" alt="Bicicletas Híbridas">
            </div>
            <div class="col-md-3 col-5">
                <div class="grilla-categorias">
                    <div>
                        <p class="visually-hidden">Bicicleta Urbana</p>
                        <img src="img/bicicleta-urbana.jpg" alt="Bicicleta Urbana">
                    </div>
                    <div>
                        <p class="visually-hidden">Bicicleta de Ruta</p>
                        <img src="img/bicicleta-de-ruta.jpg" alt="Bicicleta de Ruta">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="promociones container">
        <div class="row">
            <div class="col-md-7">
                <h2>NUEVAS CARACTERÍSTICAS</h2>
                <P>¡Encontrá la bici de tus sueños!</P>
                <a href="index.php?s=productos" class="btn btn-primary"> Ver productos</a>
            </div>
            <div class="col-md-5">
                <figure>
                    <img src="img/bici-urbana-promociones.jpg" alt="Chica andando en bicicleta por la calle">
                </figure>
            </div>
        </div>
    </section>
    <section class="asesoramiento container">
        <h2>Asesoramiento gratuito</h2>
        <p>En Velobike te brindamos un asesoramiento especial y totalmente gratuito para que disfrutes al máximo tu bicicleta y puedas hacerlo sin preocuparte por el precio ni calidad. <br/> Nuestro objetivo es siempre darte lo que necesitas y cumplir
            tus sueños.
            <span>¡Te ayudamos a encontrar tu estilo!</span>
        </p>
    </section>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Why do I have this issue?</a>'
        })
    </script>
@endsection
