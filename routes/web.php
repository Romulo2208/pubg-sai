<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeeklyStatController;

Route::get('/', function () {
    return '<h1>Laravel está rodando!</h1>';
});

Route::resource('weekly-stats', WeeklyStatController::class);