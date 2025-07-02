
@extends('layouts.app')
@section('content')
  <h1>Estatísticas Semanais</h1>
  <table class="table table-bordered">
    <thead>
      <tr>
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
        <td>{{ $stat->player_name }}</td>
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
      <tr>
        <td><strong>Total</strong></td>
        <td>{{ $stats->sum('kills') }}</td>
        <td>{{ $stats->sum('assists') }}</td>
        <td>{{ $stats->sum('damage') }}</td>
        <td>{{ $stats->sum('survived_minutes') }}</td>
        <td>{{ $stats->sum('rescues') }}</td>
        <td>{{ $stats->sum('call_back') }}</td>
        <td>{{ $stats->sum('score') }}</td>
        <td>{{ $stats->sum('mvp_count') }}</td>
        <td>{{ $stats->sum('coffee_breaks') }}</td>
        <td>{{ $stats->sum('matches_played') }}</td>
      </tr>
    </tbody>
  </table>
@endsection
