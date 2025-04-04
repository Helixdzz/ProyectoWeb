<?php

// app/Models/Recomendacion.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recomendacion extends Model
{
    // Relación con User (una recomendación pertenece a un user)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}