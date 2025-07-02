@extends('layouts.app')
@section('content')
    <h1>Gráficos</h1>
    <div class="mb-4">
        <canvas id="scoreChart" style="max-width:500px;"></canvas>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4 text-center">
            <canvas id="coffeeChart" width="300" height="300"></canvas>
        </div>
        <div class="col-md-6 mb-4 text-center">
            <canvas id="mvpChart" width="300" height="300"></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = @json($labels);
        const scoreData = @json($scores);
        const coffeeData = @json($coffees);
        const mvpData = @json($mvps);

        new Chart(document.getElementById('scoreChart'), {
            type: 'bar',
            data: {labels: labels, datasets: [{label: 'Pontuação', data: scoreData, backgroundColor: 'rgba(54,162,235,0.5)', borderColor: 'rgb(54,162,235)', borderWidth: 1}]}
        });
        new Chart(document.getElementById('coffeeChart'), {
            type: 'pie',
            data: {labels: labels, datasets: [{data: coffeeData, backgroundColor: labels.map((_,i)=>`hsl(${i*40},70%,70%)`)}]}
        });
        new Chart(document.getElementById('mvpChart'), {
            type: 'pie',
            data: {labels: labels, datasets: [{data: mvpData, backgroundColor: labels.map((_,i)=>`hsl(${i*40+20},70%,70%)`)}]}
        });
    </script>
@endsection
