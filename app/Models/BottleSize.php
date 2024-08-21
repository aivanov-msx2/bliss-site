<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BottleSize extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function wines()
    {
        return $this->hasMany('App\Models\Wine');
    }

}
