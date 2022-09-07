@extends('layouts.main')
@section('title', 'Nosotros')

@section('main')
    <section class="banner-nosotros">
        <h1 class="visually-hidden">Sección nosotros</h1>
    </section>

    <section class="nosotros container">
        <h2 class="mb-5">Nuestra compañía</h2>
        <article class="row">
            <div class="texto-nosotros col-md-6">
                <h3>Un estilo de vida</h3>
                <p>Creemos que las bicicletas son sinónimo de una vida sana y un hábito muy saludable que puede mejorar la                       vida de las personas.
                    Desde hace ya dos años empezamos con nuestro proyecto, en el barrio de Palermo, con la intención desde un                       principio, de ser diferentes.
                </p>
            </div>
            <div class="col-md-6">
                <img src="img/bicicleta-nosotros.jpg" alt="Hombre parado en bicicleta en la calle  ">
            </div>
        </article>

        <article class="row mt-5">
            <div class="col-md-6 ">
                <img src="img/bici-nosotros.jpg" alt="Primer plano de una bicicleta y una mujer agarrando el manubrio">
            </div>
            <div class="texto-nosotros texto-mobile col-md-6">
                <h3>Nuestra misión</h3>
                <p>Nuestra misión es ayudarte en lo que estás buscando, en un solo lugar y sin preocupaciones innecesarias.Gracias a una búsqueda razonable y un servicio honesto, mejoramos un poco la vida de nuestros clientes ahora                    mismo.</p>
            </div>
        </article>
    </section>



@endsection



