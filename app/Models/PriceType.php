<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function wines()
    {
        return $this->belongsToMany('App\Models\Wine', 'wine_price');
    }
}
