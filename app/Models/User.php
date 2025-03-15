<?php

// app/Models/User.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    // Relación con HistorialConsumo (un usuario tiene muchos registros de consumo)
    public function historialConsumo(): HasMany
    {
        return $this->hasMany(HistorialConsumo::class);
    }

    // Relación con Recomendacion (un usuario tiene muchas recomendaciones)
    public function recomendaciones(): HasMany
    {
        return $this->hasMany(Recomendacion::class);
    }

    // Relación con Desafio (un usuario puede completar muchos desafíos)
    public function desafios(): BelongsToMany
    {
        return $this->belongsToMany(Desafio::class)->withTimestamps();
    }

    // Relación con Recompensa (un usuario puede canjear muchas recompensas)
    public function recompensas(): BelongsToMany
    {
        return $this->belongsToMany(Recompensa::class)->withTimestamps();
    }
}