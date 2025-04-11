<?php

use App\Http\Controllers\web\Shared\DashboardController;
use App\Http\Controllers\web\Shared\LoginController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('login')->name('login.')->controller(LoginController::class)->group(function (Router $router) {
    Route::get('', 'form')->name('form');
    Route::post('', 'authenticate')->name('authenticate');
});

Route::prefix('')->middleware(['auth', 'web'])->group(function (Router $router) {
    Route::get('', [DashboardController::class, 'dashboard'])->name('dashboard');
});