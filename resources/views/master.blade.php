<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aula Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-brand">Aula Laravel</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{Route::current()->uri == 'cervejarias' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('cervejarias.index') }}">Cervejarias <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{Route::current()->uri == 'cervejas' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('cervejas.index') }}">Cervejas</a>
            </li>
            <li class="nav-item {{Route::current()->uri == 'ingredientes' ? 'active' : '' }}">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Ingredientes</a>
            </li>
        </ul>
    </div>
    </nav>
    
    <main class="container pt-4">
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
        
        @yield('content')   
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>