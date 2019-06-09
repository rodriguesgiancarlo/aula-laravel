@extends('master')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('cervejas.index') }}">Cervejas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Alterar cerveja</li>
  </ol>
</nav>

<form action="{{ route('cervejas.update', $cerveja->id) }}" method="POST">
    @method('PUT')
    @include('cervejas.form')
</form>

@endsection