
@extends('layouts.app')
@section('content')
  <h1>Estatísticas Semanais</h1>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Semana</th>
        <th>Jogador</th>
        <th>Abates</th>
        <th>Assistências</th>
        <th>Dano</th>
        <th>Sobreviveu (min)</th>
        <th>Resgate</th>
        <th>Chamar de volta</th>
        <th>Pontuação</th>
        <th>MVP</th>
        <th>Café</th>
        <th>Partidas jogadas</th>
      </tr>
    </thead>
    <tbody>
      @foreach($stats as $stat)
      <tr>
        <td>{{ $stat->week_start->format('d/m/Y') }}</td>
        <td>{{ $stat->player->name }}</td>
        <td>{{ $stat->kills }}</td>
        <td>{{ $stat->assists }}</td>
        <td>{{ $stat->damage }}</td>
        <td>{{ $stat->survived_minutes }}</td>
        <td>{{ $stat->rescues }}</td>
        <td>{{ $stat->call_back }}</td>
        <td>{{ $stat->score }}</td>
        <td>{{ $stat->mvp_count }}</td>
        <td>{{ $stat->coffee_breaks }}</td>
        <td>{{ $stat->matches_played }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
