<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Country extends Model
{
    use HasFactory;

    public function regions()
    {
        return $this->hasMany('App\Models\Region');
    }

    public static function getPublicCountries()
    {

        $countries = Country::where('public', 1)
            ->get()
            ->sortBy(function ($country) {
                return $country->name;
            });

        $data = [];

        foreach ($countries as $country) {

            $countryData = [
                'name' => $country->name,
                'slug' => $country->slug,
                'country_thumb_file' => ($country->country_thumb_file) ? Country::getCountryThumbPublicLocation() . "/" . $country->country_thumb_file : "",
            ];

            array_push($data, $countryData);
        }

        return $data;
    }

    public function priceBookWineries()
    {
        $wineries = new Collection();
        dd($this);
        foreach ($this->regions as $region) {
            foreach ($region->wineries as $winery) {
                if (
                    // $winery->name != 'CVD'
                    // && $winery->name != 'Lagar de Darei'
                    // && $winery->name != 'Duca di Dolle'
                    // && 
                    $winery->public == 1) {
                    $wineries->push($winery);
                }
            }
        }
        return $wineries;
    }

    public static function getCountryImagePublicLocation()
    {
        return url('/assets/img/_managed_content');
    }

    public static function getCountryThumbPublicLocation()
    {
        return url('/assets/img/_managed_content');
    }
}
