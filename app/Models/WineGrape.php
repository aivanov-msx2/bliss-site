<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WineGrape extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'wine_grape';

    /* Pivot Table*/

    public function wine()
    {
        return $this->belongsTo('App\Models\Wine');
    }

    public function grape()
    {
        return $this->belongsTo('App\Models\Grape');
    }
}
