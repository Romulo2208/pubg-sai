<!DOCTYPE html>
<html>
<head>
    <title>Meu Sistema Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <nav class="bg-light p-3" style="min-width:200px;">
            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('players.index') }}" class="nav-link">Jogadores</a></li>
                <li class="nav-item"><a href="{{ route('matches.index') }}" class="nav-link">Partidas</a></li>
                <li class="nav-item"><a href="{{ route('weekly-stats.index') }}" class="nav-link">Estatísticas Semanais</a></li>
                <li class="nav-item"><a href="{{ route('charts.index') }}" class="nav-link">Gráficos</a></li>
            </ul>
        </nav>
        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
