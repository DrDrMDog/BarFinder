<?php

use App\Http\Controllers\Auth\LoginFormController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('login')->name('login.')->group(function (Router $router) {
    Route::get('', LoginFormController::class)->name('form');
    Route::post('', LoginController::class)->name('login');
});

/*
Route::prefix('')->middleware(['auth', 'web'])->group(function (Router $router) {
    Route::get('', [DashboardController::class, 'dashboard'])->name('dashboard');
});

*/