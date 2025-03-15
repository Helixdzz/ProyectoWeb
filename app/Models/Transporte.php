<?php

// app/Models/Transporte.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transporte extends Model
{
    // Relación con HistorialConsumo (un transporte puede estar en muchos registros de consumo)
    public function historialConsumo(): HasMany
    {
        return $this->hasMany(HistorialConsumo::class);
    }
}