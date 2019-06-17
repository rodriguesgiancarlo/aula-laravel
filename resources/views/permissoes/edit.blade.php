@extends('layouts.app')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('permissoes.index') }}">Permissões</a></li>
    <li class="breadcrumb-item active" aria-current="page">Alterar permissões de {{ $user->name }}</li>
  </ol>
</nav>

<form action="{{ route('permissoes.update', $user) }}" method="POST">
    @method('PUT')
    @csrf

    <select class="custom-select"
            name="permissoes[]"
            size="20"
            multiple>
        @foreach($permissoes as $p)
            <option value="{{ $p->id }}"
            {{ $user->permissoes->contains('id', $p->id) ? 'selected' : '' }}
            >{{ $p->slug }}</option>
        @endforeach
    </select>

    <div class="row p-2">
        <button class="btn btn-success" type="submit">Gravar</button>
    </div>
</form>


@endsection