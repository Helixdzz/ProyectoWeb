<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;  // Add this import

class User extends Authenticatable
{
    use Notifiable, HasRoles;  // Add HasRoles trait

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relación con HistorialConsumo (un user tiene muchos registros de consumo)
    public function historialConsumo(): HasMany
    {
        return $this->hasMany(HistorialConsumo::class);
    }

    // Relación con Recomendacion (un user tiene muchas recomendaciones)
    public function recomendaciones(): HasMany
    {
        return $this->hasMany(Recomendacion::class);
    }

    // Relación con Desafio (un user puede completar muchos desafíos)
    public function desafios(): BelongsToMany
    {
        return $this->belongsToMany(Desafio::class)->withTimestamps();
    }

    // Relación con Recompensa (un user puede canjear muchas recompensas)
    public function recompensas(): BelongsToMany
    {
        return $this->belongsToMany(Recompensa::class)->withTimestamps();
    }
}
