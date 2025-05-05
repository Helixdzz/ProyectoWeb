<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EcoTipController;
use App\Http\Controllers\AdminController;

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

    // EcoTips - Vista pública
    Route::resource('eco-tips', EcoTipController::class)->only(['index', 'show']);

    // Crear EcoTips (solo admins)
    Route::middleware('can:create,App\Models\EcoTip')->group(function () {
        Route::resource('eco-tips', EcoTipController::class)->only(['create', 'store']);
    });

    // Editar EcoTips (solo admins)
    Route::middleware('can:update,eco_tip')->group(function () {
        Route::resource('eco-tips', EcoTipController::class)->only(['edit', 'update']);
    });

    // Eliminar EcoTips (solo admins)
    Route::middleware('can:delete,eco_tip')->group(function () {
        Route::resource('eco-tips', EcoTipController::class)->only(['destroy']);
    });

    // Gestión de usuarios (solo admins, autorizado vía política)
    Route::resource('users', UserController::class);

    Route::middleware('can:viewAny,App\Models\User')->group(function () {
        Route::resource('users', UserController::class)->except(['index']);
    });

    Route::middleware('can:viewAny,App\Models\User')->group(function () {
        Route::resource('users', UserController::class);
    });
    
    

    // Ruta para alternar el rol admin
    Route::patch('/users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('users.toggle-admin');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
