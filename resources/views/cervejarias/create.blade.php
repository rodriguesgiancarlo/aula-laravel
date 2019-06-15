@extends('layouts.app')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('cervejarias.index') }}">Cervejarias</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nova cervejaria</li>
  </ol>
</nav>

<form action="{{ route('cervejarias.store') }}" method="POST">
    @include('cervejarias.form')
</form>

@endsection