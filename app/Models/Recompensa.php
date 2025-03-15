<?php

// app/Models/Recompensa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recompensa extends Model
{
    // Relación con User (una recompensa puede ser canjeada por muchos usuarios)
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
