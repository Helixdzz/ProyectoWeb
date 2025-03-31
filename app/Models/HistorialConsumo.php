<?php

// app/Models/HistorialConsumo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistorialConsumo extends Model
{
    // Relación con User (un registro de consumo pertenece a un user)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Producto (un registro de consumo puede estar asociado a un producto)
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    // Relación con Transporte (un registro de consumo puede estar asociado a un transporte)
    public function transporte(): BelongsTo
    {
        return $this->belongsTo(Transporte::class);
    }
}
