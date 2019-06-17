@extends('layouts.app')
@section('content')

<div class="row pb-4">
    <span class="display-4">Listagem de cervejas</span>
</div>

<div class="row">
    @can('cervejas.create')
    <a href="{{ route('cervejas.create') }}" class="btn btn-success">Nova cerveja</a>
    @endcan
</div>

<div class="row pt-2">
    <table class="table table-striped">
        <thead>
            <tr>
                <td scope="col">Nome</td>
                <td scope="col">Cervejaria</td>
                <td scope="col" colspan="2">Opções</td>
            </tr>
        </thead>
        <tbody>
            @foreach($cervejas as $cerveja)
                <tr>
                    <td>{{ $cerveja->nome }}</td>
                    <td>{{ $cerveja->cervejaria->nome }}</td>
                    <td>
                        @can('cervejas.edit')
                            <a class="btn btn-sm btn-primary" href="{{ route('cervejas.edit', $cerveja->id) }}">Alterar</a>
                        @endcan
                    </td>
                    <td>
                        @can('cervejas.edit')
                        <form action="{{ route('cervejas.destroy', $cerveja->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection