<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WineryPhoto extends Model
{
    use HasFactory;

    public function winery()
    {
        return $this->belongsTo('App\Models\Winery');
    }
}
