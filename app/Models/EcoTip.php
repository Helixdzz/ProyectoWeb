<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcoTip extends Model
{
    protected $fillable = ['title', 'content', 'category', 'image_path'];

}
