@extends('layouts.app')
@section('content')
    <h1>Editar Partida</h1>
    <form action="{{ route('matches.update', $match) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Dia</label>
            <input type="date" name="date" class="form-control" value="{{ $match->date }}" required>
        </div>
        @foreach($players as $player)
            @php $stat = $match->playerStats->firstWhere('player_id', $player->id); @endphp
            <h4>{{ $player->name }}</h4>
            <div class="row mb-2">
                <div class="col"><input type="number" name="players[{{ $player->id }}][kills]" class="form-control" placeholder="Abates" value="{{ $stat->kills ?? '' }}"></div>
                <div class="col"><input type="number" name="players[{{ $player->id }}][assists]" class="form-control" placeholder="Assistências" value="{{ $stat->assists ?? '' }}"></div>
                <div class="col"><input type="number" name="players[{{ $player->id }}][damage]" class="form-control" placeholder="Dano" value="{{ $stat->damage ?? '' }}"></div>
                <div class="col"><input type="number" step="0.01" name="players[{{ $player->id }}][survived]" class="form-control" placeholder="Sobreviveu" value="{{ $stat->survived ?? '' }}"></div>
                <div class="col"><input type="number" name="players[{{ $player->id }}][rescue]" class="form-control" placeholder="Resgate" value="{{ $stat->rescue ?? '' }}"></div>
                <div class="col"><input type="number" name="players[{{ $player->id }}][recall]" class="form-control" placeholder="Chamar de volta" value="{{ $stat->recall ?? '' }}"></div>
                <div class="col"><input type="number" step="0.01" name="players[{{ $player->id }}][score]" class="form-control" placeholder="Pontuação" value="{{ $stat->score ?? '' }}"></div>
                <div class="col"><input type="checkbox" name="players[{{ $player->id }}][mvp]" value="1" {{ isset($stat) && $stat->mvp ? 'checked' : '' }}> MVP</div>
                <div class="col"><input type="checkbox" name="players[{{ $player->id }}][coffee]" value="1" {{ isset($stat) && $stat->coffee ? 'checked' : '' }}> Café</div>
                <div class="col"><input type="checkbox" name="players[{{ $player->id }}][played]" value="1" {{ isset($stat) && $stat->played ? 'checked' : '' }}> Jogou?</div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
