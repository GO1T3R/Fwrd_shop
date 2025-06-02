<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Tienda')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-dyB6UlgPjquEP52rU7X8tmeedbXMj5KFSsWjPv6SHmD5/1EJ3j7Je0z5aOcvPydr" crossorigin="anonymous">


</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url ('/inicio')}}" id="tittle-logo">frwd</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=" {{ url('/inicio')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url ('/playeras')}}">Playeras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url ('/acerca')}}">Acerca</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url ('/orders')}}">Pedidos</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item">
                    <a class="btn btn-outline-primary nav-link" href="#">Hola, {{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <li class="nav-item">
                    <a class="btn btn-outline-primary nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary nav-link" href="{{ route('register') }}">Registrarse</a>
                </li>
            @endauth

            <li class="nav-item">
                <a class="btn btn-outline-secondary nav-link position-relative" href="{{ route('cart.index') }}">
                    Carrito <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                </a>
            </li>
        </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</body>

@if (!isset($hideFooter) || !$hideFooter)
<footer class="bg-dark text-white mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-3">
                <h5>Sobre Nosotros</h5>
                <p>Somos una tienda en línea dedicada a ofrecer la mejor ropa y accesorios para todos. Nuestra misión es proporcionar productos de alta calidad a precios accesibles.</p>
            </div>
            <div class="col-md-4 mt-3">
                <h5>Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/inicio') }}" class="text-white">Inicio</a></li>
                    <li><a href="{{ url('/acerca') }}" class="text-white">Acerca</a></li>
                    <li><a href="{{ url('/playeras') }}" class="text-white">Playeras</a></li>
                    <li><a href="{{ url('/orders') }}" class="text-white">Pedidos</a></li>
                </ul>
            </div>
            <div class="col-md-4 mt-3">
                <h5>Contacto</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt"></i> Dirección: Calle Falsa 123, Ciudad, País</li>
                    <li><i class="fas fa-phone"></i> Teléfono: (123) 456-7890</li>
                    <li><i class="fas fa-envelope"></i> Email: info@tienda.com</li>
                </ul>
            </div>
        </div>
        <div class="text-center py-3">
            &copy; 2024 Tienda. Todos los derechos reservados.
        </div>
    </div>
</footer>
@endif

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
