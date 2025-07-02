<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeeklyStatController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MatchController;

Route::get('/', function () {
    return '<h1>Laravel está rodando!</h1>';
});

Route::resource('weekly-stats', WeeklyStatController::class);
Route::resource('players', PlayerController::class);
Route::resource('matches', MatchController::class);
