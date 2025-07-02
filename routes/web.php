<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeeklyStatController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ChartController;

Route::get('/', function () {
    return view('home');
});

Route::resource('weekly-stats', WeeklyStatController::class);
Route::resource('players', PlayerController::class);
Route::resource('matches', MatchController::class);
Route::get('charts', [ChartController::class, 'index'])->name('charts.index');
