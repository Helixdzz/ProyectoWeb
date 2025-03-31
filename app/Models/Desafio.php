<?php

// app/Models/Desafio.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Desafio extends Model
{
    // Relación con User (un desafío puede ser completado por muchos users)
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
