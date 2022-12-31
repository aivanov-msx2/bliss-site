<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winery extends Model
{
    use HasFactory;

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\WineryPhoto');
    }

    public function wines()
    {
        return $this->hasMany('App\Models\Wine');
    }

    public static function getWineriesByCountry($country)
    {
        
        $regions = Region::where('country_id', $country->id)->get();

        $data = [];

        foreach($regions as $region){

            $winery = Winery::where('region_id', $region->id)
                ->where(function($query) {

                    $query->where('public', 1);

                })
                ->get();

            foreach($winery as $winery){
                $wineryData = [
                    'name' => $winery->name,
                    'region' => $region->name,
                    'slug' => $winery->slug,
                    'winemaker_full_name' => $winery->winemaker_full_name,
                    'winemaker_image_file' => Winery::getWinemakerImagePublicLocation() . "/" . $winery->winemaker_image_file,
                ];
                array_push($data, $wineryData);
            }
        }


        return $data;
    }

    // TODO: completely get rid of "public_wineclub" property from database
    public function publicWines()
    {
        return $this->wines()
            ->where(function($query) {

                $query->where('public', 1);

            })
            ->orderBy('sort_order')
            ->get();
    }

    public function publicWinesDistributorPricebook()
    {
        return $this->wines()
            ->where(function($query) {

                $query->where(['public' => 1, 'hide_from_dist_price_book' => 0]);

            })
            ->orderBy('sort_order')
            ->get();
    }

    // TODO: find out why most of the wines don't have wholesale prices
    public function publicWinesWholesalePricebook()
    {
        return $this->wines()
            ->where(function($query) {

                $query->where(['public' => 1, 'hide_from_wholesale_price_book' => 0]);

            })
            ->orderBy('sort_order')
            ->get();
    }

    public static function getWineryBySlug($winerySlug)
    {
        return Winery::where('slug', $winerySlug)->first();
    }

    public static function getPublicWineryBySlug($winerySlug)
    {
        $winery = Winery::where('slug', $winerySlug)->first();
        
        if ($winery && $winery->public) {
            return $winery;
        }
    }

    public static function getWinemakerImagePublicLocation()
    {
        return url('/assets/img/_managed_content');
    }

    public function getWineryImage()
    {
        return url('/assets/img/_managed_content') . "/" . $this->winery_image_file;
    }

    public function getWinemakerImage()
    {
        return url('/assets/img/_managed_content') . "/" . $this->winemaker_image_file;
    }

    public function getRegionImage()
    {
        return url('/assets/img/_managed_content') . "/" . $this->region->map_image_file;
    }
}
