 <?php
 /**@var Productos[] | Collection $productos **/
 /**@var string|null $busqueda **/
 use App\Models\Productos;
 use Illuminate\Database\Eloquent\Collection;


 ?>
@extends('layouts.main')
@section('title', 'Productos')
@section('main')
    <section class="productos row justify-content-center">
        <h1>Productos</h1>
        @if(Session::has('carrito'))
            <div class="alert alert-success mb-3">{!! Session::get('carrito') !!}</div>
        @endif
        <section>
            <h2 class="visually-hidden">Buscador</h2>
            <form class="d-flex my-4" action=" {{route('productos.index')}}" method="get">
                <label class="visually-hidden" for="busqueda">Búsqueda</label>
                <input
                    class="form-control me-2 "
                    type="search" aria-label="busqueda"
                    placeholder="Buscar"
                    id="busqueda"
                    name="busqueda"
                    value="{{ $busqueda }}">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
        </section>

        @if($productos->isNotEmpty())
            @foreach($productos as $producto)
                <article class="producto d-flex flex-column col-md-3 mb-4">
                    @if($producto->imagen != '' && file_exists(public_path('img/' . $producto->imagen)))
                    <figure>
                        @php
                            [$width, $height, $type, $attrs] = getimagesize(public_path('img/' .$producto->imagen));
                        @endphp
                        <img src="{{ url('img/' . $producto->imagen) }}" alt="$producto->nombre" {!! $attrs !!}>
                    </figure>
                    @endif
                    <div class="d-flex flex-column mt-auto">
                        <h2>{{$producto->nombre}}</h2>
                        <p> Precio: <span>${{$producto->precio}} </span></p>
                        <a class="btn btn-primary mt-auto  w-100" href="{{ route('productos.ver', ['id' =>
                    $producto->productos_id]) }}">Ver producto</a>
                    </div>

                </article>
            @endforeach
            {{$productos->links()}}
        @else
            <p class="text-center mb-5">No hay ningún producto para mostrar</p>
        @endif
    </section>
    <script src="../js/bootstrap.bundle.min.js"></script>
@endsection
