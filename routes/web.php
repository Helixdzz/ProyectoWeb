<?php

use Illuminate\Support\Facades\Route;

// routes/web.php
use App\Http\Controllers\ProductoController;

// Rutas para el CRUD de Producto
Route::resource('productos', ProductoController::class);
