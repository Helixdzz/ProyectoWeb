<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\ProductoController;  // Add this if you have productos
use App\Http\Controllers\UserController;     // Add this if you want to manage users
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EcoTipController;

// Landing page (public)
Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

// Authentication routes
require __DIR__.'/auth.php';

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Transportes CRUD
    Route::resource('transportes', TransporteController::class);
    
    // Productos CRUD (if needed)
    Route::resource('productos', ProductoController::class);
    
   // User management routes
Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('users.toggle-admin');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('eco-tips', EcoTipController::class)->except(['show', 'index']);
});

// Public routes
Route::resource('eco-tips', EcoTipController::class)->only(['show', 'index']);


    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});