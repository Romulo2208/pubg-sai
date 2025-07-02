@extends('layouts.app')
@section('content')
    <h1>Partidas</h1>
    <a href="{{ route('matches.create') }}" class="btn btn-primary mb-2">Nova Partida</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dia</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $match)
                <tr>
                    <td>{{ $match->id }}</td>
                    <td>{{ $match->date }}</td>
                    <td>
                        <a href="{{ route('matches.edit', $match) }}" class="btn btn-sm btn-secondary">Editar</a>
                        <form action="{{ route('matches.destroy', $match) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
