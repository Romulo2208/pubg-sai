
@extends('layouts.app')
@section('content')
  <h1>Estatísticas Semanais</h1>
  <table>
    <thead>
      <tr><th>Semana</th><th>Jogador</th><th>Abates</th></tr>
    </thead>
    <tbody>
      @foreach($stats as $stat)
      <tr>
        <td>{{ $stat->week_start->format('d/m/Y') }}</td>
        <td>{{ $stat->player->name }}</td>
        <td>{{ $stat->kills }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
