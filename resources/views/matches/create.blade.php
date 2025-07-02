@extends('layouts.app')
@section('content')
    <h1>Nova Partida</h1>
    <form action="{{ route('matches.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Dia</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        @foreach($players as $player)
            <h4>{{ $player->name }}</h4>
            <div class="row mb-2">
                <div class="col"><input type="number" name="players[{{ $player->id }}][kills]" class="form-control" placeholder="Abates"></div>
                <div class="col"><input type="number" name="players[{{ $player->id }}][assists]" class="form-control" placeholder="Assistências"></div>
                <div class="col"><input type="number" name="players[{{ $player->id }}][damage]" class="form-control" placeholder="Dano"></div>
                <div class="col"><input type="number" step="0.01" name="players[{{ $player->id }}][survived]" class="form-control" placeholder="Sobreviveu"></div>
                <div class="col"><input type="number" name="players[{{ $player->id }}][rescue]" class="form-control" placeholder="Resgate"></div>
                <div class="col"><input type="number" name="players[{{ $player->id }}][recall]" class="form-control" placeholder="Chamar de volta"></div>
                <div class="col"><input type="number" step="0.01" name="players[{{ $player->id }}][score]" class="form-control" placeholder="Pontuação"></div>
                <div class="col"><input type="checkbox" name="players[{{ $player->id }}][mvp]" value="1"> MVP</div>
                <div class="col"><input type="checkbox" name="players[{{ $player->id }}][coffee]" value="1"> Café</div>
                <div class="col"><input type="checkbox" name="players[{{ $player->id }}][played]" value="1" checked> Jogou?</div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
