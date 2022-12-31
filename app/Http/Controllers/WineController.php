<?php

namespace App\Http\Controllers;

use App\Models\Winery;
use App\Models\Country;
use App\Models\Hero;
use App\Models\Wine;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::getPublicCountries();

        $randomHeroSrc = Hero::getPublicLocation() . '/' . Hero::getRandom()->image_file;
        
        return Inertia::render('Wines/Index', [
            'countries' => $countries,
            'randomHeroSrc' => $randomHeroSrc,
        ]);
    }

    /**
     * Display a list of the winemakers for the specified country.
     *
     * @return \Illuminate\Http\Response
     */
    public function country($countrySlug)
    {
        $country = Country::where('slug', $countrySlug)->first();
        if (!$country) {
            abort(404);
        }
        $wineries = Winery::getWineriesByCountry($country);
        $countryImageFile = ($country->country_image_file) ? Country::getCountryImagePublicLocation() . "/" . $country->country_image_file : "";
        $countryData = ['name' => $country->name, 'countryImageFile' => $countryImageFile];

        return Inertia::render('Wines/Country', [
            'countryData' => $countryData,
            'wineries' => $wineries,
        ]);
    }
    
    /**
     * Display a the selected winemaker and their wines
     *
     * @return \Illuminate\Http\Response
     */
    public function winery($winerySlug)
    {
        $winery = Winery::getPublicWineryBySlug($winerySlug);
        if (!$winery) {
            abort(404);
        }

        $wineryData = [
            ['title' => 'Vineyard Size', 'value' => $winery->vineyard_size],
            ['title' => 'Total Production', 'value' => $winery->total_winery_production],
            ['title' => 'Farming', 'value' => $winery->farming],
            ['title' => 'Certification', 'value' => $winery->certification],
            ['title' => 'Grapes Planted (Red)', 'value' => $winery->grapes_planted_red],
            ['title' => 'Grapes Planted (White)', 'value' => $winery->grapes_planted_white]
        ];

        return Inertia::render('Wines/Winery', [
            'winery' => $winery,
            'wineryData' => $wineryData,
            'wineryImg' => $winery->getWineryImage(),
            'winemakerImg' => $winery->getWinemakerImage(),
            'regionImg' => $winery->getRegionImage(),
            'region' => $winery->region,
            'country' => $winery->region->country,
            'photos' => $winery->photos,
            'wines' => $winery->wines,
            'wineImgLocation' => Wine::getImagePublicLocation(),
        ]);
    }

    /**
     * Display a the selected wine
     *
     * @return \Illuminate\Http\Response
     */
    public function wine($winerySlug, $wineSlug)
    {
        $wine = Wine::getPublicWineBySlug($wineSlug);
        $winery = Winery::getPublicWineryBySlug($winerySlug);
        if (!$wine || !$winery) {
            abort(404);
        }

        $grapes = $wine->grapes;

        $wineData = [
            ['title' => 'Alc', 'value' => $wine->alc],
            ['title' => 'PH', 'value' => $wine->ph],
            ['title' => 'TA', 'value' => $wine->ta],
            ['title' => 'RS', 'value' => $wine->rs],
            ['title' => 'Sulfur', 'value' => $wine->sulfur],
            ['title' => 'Soil', 'value' => $wine->soil],
            ['title' => 'Altitude', 'value' => $wine->altitude],
            ['title' => 'Vineyard Age', 'value' => $wine->vineyard_age_years],
            ['title' => 'Production Size', 'value' => $wine->production_size],
            ['title' => 'Pairing Options', 'value' => $wine->text_pairing],
            ['title' => 'More Pairing Options', 'value' => $wine->text_pairing_2],
        ];

        return Inertia::render('Wines/Wine', [
            'wine' => $wine,
            'winery' => $winery,
            'wineryImg' => $winery->getWineryImage(),
            'wineImg' => $wine->getWineImage(),
            'wineData' => $wineData,
            'regionImg' => $winery->getRegionImage(),
            'region' => $winery->region,
            'country' => $winery->region->country,
            'grapes' => $grapes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function show(Wine $wine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function edit(Wine $wine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wine $wine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wine $wine)
    {
        //
    }
}
