@extends('layouts.app')
@section('content')
    <h1>Jogadores</h1>
    <a href="{{ route('players.create') }}" class="btn btn-primary mb-2">Novo Jogador</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td>{{ $player->id }}</td>
                    <td>{{ $player->name }}</td>
                    <td>
                        <a href="{{ route('players.edit', $player) }}" class="btn btn-sm btn-secondary">Editar</a>
                        <form action="{{ route('players.destroy', $player) }}" method="POST" style="display:inline-block;">
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
