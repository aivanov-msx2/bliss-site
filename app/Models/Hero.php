<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    public static function getRandom()
    {
        return Hero::inRandomOrder()->where('public', 1)->first();
    }

    public static function getPublicLocation()
    {
        return url('/assets/img/_managed_content');
    }
}
