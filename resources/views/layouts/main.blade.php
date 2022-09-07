<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Velobike - @yield('title')</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('css/estilos.css')}}">
        <link rel="shortcut icon" href="{{url('img/favicon.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{url('img/favicon.ico')}}" type="image/x-icon">
    </head>
    <body>
        <header>
            <p id="logo">Velobike</p>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto ">
                            <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/nosotros')}}">Nosotros</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Noticias</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('productos.index')}}">Productos</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/contacto')}}">Contacto</a></li>
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{auth()->user()->name}}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{url('perfil')}}">Perfil</a></li>
                                        @if(!auth()->user()->admin)
                                            <li><a class="dropdown-item" href="{{url('carrito')}}">Carrito</a></li>
                                            <li><a class="dropdown-item" href="{{url('compras')
                                            }}">Mis compras</a></li>
                                        @endif
                                       @if(auth()->user()->admin)
                                            <li class="nav-item"><a class="nav-link" href="{{url('admin/index')}}">Panel</a></li>

                                       @endif

                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form class="dropdown-item" action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button type="submit" class="cerrarSesion"> Cerrar Sesion</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endauth
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.form')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('registro.form')}}">Registro</a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container">
            @if(Session::has('message.success'))
                <div class="alert alert-success mb-3">{!! Session::get('message.success') !!}</div>
            @endif
            @if(Session::has('message.error'))
                <div class="alert alert-danger mb-3">{!! Session::get('message.error') !!}</div>
            @endif
            @yield('main')
        </div>

        <footer>
            <div>
                <p>VELOBIKE</p>
                <p>Todos los derechos reservados</p>
                <p>Laura Lopez y Micaela Djeordjian</p>
            </div>
            <div class="redes">
                <ul>
                    <li><a href="https://www.facebook.com/" id="fb" target="_blank">Facebook </a></li>
                    <li><a href="https://www.instagram.com/" id="ig" target="_blank">Instagram </a></li>
                    <li><a href="https://web.whatsapp.com/%F0%9F%8C%90/es" id="wp" target="_blank">Whatsapp </a></li>
                </ul>
            </div>
        </footer>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="sweetalert2.all.min.js"></script>
    </body>
</html>
