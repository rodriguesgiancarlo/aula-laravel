@extends('master')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('cervejas.index') }}">Cervejas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nova cerveja</li>
  </ol>
</nav>

<form action="{{ route('cervejas.store') }}" method="POST">
    @include('cervejas.form')
</form>

@endsection