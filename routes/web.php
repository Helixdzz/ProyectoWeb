<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\ProfileController;

// Ruta para la landing page (accesible para todos)
Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

// Rutas de autenticación (login, registro, etc.)
require __DIR__.'/auth.php';

// Rutas protegidas por autenticación
Route::middleware(['auth', 'verified'])->group(function () {
    // Ruta para el dashboard (solo usuarios autenticados)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para el CRUD de transportes
    Route::resource('transportes', TransporteController::class);

    // Rutas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});