<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function wines()
    {
        return $this->hasMany('App\Models\Wine');
    }

    public function wineries()
    {
        return $this->hasMany('App\Models\Winery');
    }

    public static function getRegionMapPublicLocation()
    {
        return url('/assets/img/_managed_content');
    }

    public static function getRegionImagePublicLocation()
    {
        return url('/assets/img/_managed_content');
    }
}
