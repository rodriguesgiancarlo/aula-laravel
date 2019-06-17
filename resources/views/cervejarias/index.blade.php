@extends('layouts.app')
@section('content')

<div class="row pb-4">
    <span class="display-4">Listagem de cervejarias</span>
</div>

<div class="row">
    @can('cervejarias.create')
    <a href="{{ route('cervejarias.create') }}" class="btn btn-success">Nova cervejaria</a>
    @endcan
</div>

<div class="row pt-2">
    <table class="table table-striped">
        <thead>
            <tr>
                <td scope="col">Nome</td>
                <td scope="col">CNPJ</td>
                <td scope="col" colspan="2">Opções</td>
            </tr>
        </thead>
        <tbody>
            @foreach($cervejarias as $cervejaria)
                <tr>
                    <td><a href="{{ route('cervejarias.show', $cervejaria->id) }}">{{ $cervejaria->nome }}</a></td>
                    <td>{{ $cervejaria->cnpj }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('cervejarias.edit', $cervejaria->id) }}">Alterar</a>
                    </td>
                    <td>
                        <form action="{{ route('cervejarias.destroy', $cervejaria->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection