<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}"></script>

    {{-- herramienta axiliar  --}}
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href=" {{ asset('css/fonts.nunito.css') }} " rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spinner.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nombre }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Menu de opciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @if(Auth::user()->role == 2)
                                  <a class="dropdown-item" href="{{ route('nuevoServicio') }}">Crear servicio</a>
                                  {{-- <a class="dropdown-item" href="{{ route('editServicio') }}">Modifcar servicio</a> --}}
                                  <a class="dropdown-item" href="{{ route('servicios') }}">Servicios</a>
                                  <a class="dropdown-item" href="{{ route('subscritores') }}">subscritores</a>
                                  <a class="dropdown-item" href="{{ route('pays.index') }}">Pagos recientes</a>
                                  <a class="dropdown-item" href=" {{ route('subscripciones') }} ">Subscripciones</a>
                                  <a class="dropdown-item" href=" {{ route('contactos') }} ">Libreta de contacto</a>
                                  <a class="dropdown-item" href=" {{ route('mensajeria.index') }} ">Envio de Mensaje</a>
                                  @elseif(Auth::user()->role == 1)
                                  <a class="dropdown-item" href=" {{ route('subs') }} ">Subscripciones</a>
                                  <a class="dropdown-item" href=" {{ route('estadoCuenta') }} ">Estado de cuenta</a>
                                  <a class="dropdown-item" href=" {{ route('pagos') }} ">Historial de pagos</a>
                                  <a class="dropdown-item" href="{{ route('servicios') }}">Servicios</a>
                                  @endif
                                </div>
                              </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
