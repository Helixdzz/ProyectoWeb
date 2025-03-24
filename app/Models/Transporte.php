<?php

// app/Models/Transporte.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transporte extends Model
{
    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'tipo',
        'huella_carbono_por_km',
    ];

    // Relación con HistorialConsumo (un transporte puede estar en muchos registros de consumo)
    public function historialConsumo()
    {
        return $this->hasMany(HistorialConsumo::class);
    }
}