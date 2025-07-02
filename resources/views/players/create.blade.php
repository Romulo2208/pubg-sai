@extends('layouts.app')
@section('content')
    <h1>Novo Jogador</h1>
    <form action="{{ route('players.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
