@extends('master')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('cervejarias.index') }}">Cervejarias</a></li>
    <li class="breadcrumb-item active" aria-current="page">Informações da cervejaria</li>
  </ol>
</nav>

<div class="row">
    <div class="col p-2">
        <fieldset>
            <legend>Informações cadastrais</legend>
            <form onsubmit="event.preventDefault()">
                @include('cervejarias.form')
            </form>
        </fieldset>
    </div>

    <div class="col p-2">
        <fieldset>
            <legend>Cervejas (total: {{ $cervejaria->cervejas->count() }})</legend>
            <ul class="list-group list-group-flush">
                @foreach($cervejaria->cervejas as $cerveja)
                <li class="list-group-item">{{ $cerveja->nome }}</li>
                @endforeach
            </ul>
        </fieldset>
    </div>
</div>

@endsection