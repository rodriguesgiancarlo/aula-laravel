<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/cervejarias') }}">
                    {{ env('APP_NAME') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @if(Auth::check())    
                        @can('cervejarias.index')
                        <li class="nav-item {{Route::current()->uri == 'cervejarias' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('cervejarias.index') }}">Cervejarias <span class="sr-only">(current)</span></a>
                        </li>
                        @endcan
                        @can('cervejas.index')
                        <li class="nav-item {{Route::current()->uri == 'cervejas' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('cervejas.index') }}">Cervejas</a>
                        </li>
                        @endcan
                        <li class="nav-item {{Route::current()->uri == 'ingredientes' ? 'active' : '' }}">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Ingredientes</a>
                        </li>
                        @can('permissoes.index')
                        <li class="nav-item {{Route::current()->uri == 'permisssoes' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('permissoes.index') }}">Permissões</a>
                        </li>
                        @endcan
                    @endif
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
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            <section id="messages">
                {{-- Controle da exibição das mensagens da página --}}
                @if ($errors->any() || Session::has('error-message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <!-- <i class="oi oi-circle-x mr-2"></i> -->
                        @if (Session::has('error-message'))
                            {{ Session::get('error-message')  }}
                        @else
                            Não foi possível executar a ação pelo(s) seguinte(s) motivo(s):<br/>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('success-message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <!-- <i class="oi oi-circle-check mr-2"></i> -->
                        {{ Session::get('success-message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{-- Fim das mensagens da página --}}
            </section>
        
            @yield('content') {{-- As views da aplicação serão renderizadas nessa parte --}}

        </main>
    </div>
</body>
</html>
