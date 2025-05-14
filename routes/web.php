<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EcoTipController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WeatherController;

// Landing page (pública)
Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

// Rutas de autenticación
require __DIR__.'/auth.php';

// Rutas para usuarios autenticados y verificados
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Transportes
    Route::resource('transportes', TransporteController::class);

    // Productos
    Route::resource('productos', ProductoController::class);

    // EcoTips - TODAS las rutas protegidas por políticas en el controlador
    Route::resource('eco-tips', EcoTipController::class);

    // Gestión de usuarios (solo admins, autorizado vía política)
    Route::resource('users', UserController::class);

    // Ruta para alternar el rol admin
    Route::patch('/users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('users.toggle-admin');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/dashboard', [App\Http\Controllers\WeatherController::class, 'show'])
    ->middleware(['auth'])->name('dashboard');

Route::get('/weather', [WeatherController::class, 'show'])->name('weather');

});
