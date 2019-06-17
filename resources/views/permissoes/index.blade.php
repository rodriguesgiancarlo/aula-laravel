@extends('layouts.app')
@section('content')

<div class="row pb-4 flex-column">
    <div class="display-4">Usuários e permissões</div>
    <p class="text-muted">Clique sobre o nome de um usuário para alterar suas permissões</p>
</div>

<div class="row pt-2">
    <div class="col list-group">
        @foreach($users as $user)
            <a @can('permissoes.edit')
                    href="{{ route('permissoes.edit', $user) }}"
               @endcan
               class="list-group-item list-group-item-action">
                {{ $user->name . ' (' . $user->email . ')' }}
            </a>
        @endforeach
    </div>
</div>


@endsection