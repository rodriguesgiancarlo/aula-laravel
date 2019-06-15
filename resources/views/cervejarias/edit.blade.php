@extends('layouts.app')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('cervejarias.index') }}">Cervejarias</a></li>
    <li class="breadcrumb-item active" aria-current="page">Alterar cervejaria</li>
  </ol>
</nav>

<form action="{{ route('cervejarias.update', $cervejaria->id) }}" method="POST">
    @method('PUT')
    @include('cervejarias.form')
</form>

@endsection