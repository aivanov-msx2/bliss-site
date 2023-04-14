<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    use HasFactory;

    protected $fillable = [
        'winery_id',
        'id',
        'name',
        'uuid',
        'nickname',
        'vintage',
        'public',
        'hide_from_dist_price_book',
        'hide_from_wholesale_price_book',
        'slug',
        'appellation',
        'vineyard_designation',
        'sort_order',
        'bottle_size_id',
        'wine_type_id',
        'pack_size_id',
        'weight',
        'alc',
        'ph',
        'sugar',
        'acid',
        'tannin',
        'ta',
        'rs',
        'sulfur',
        'soil',
        'altitude',
        'vineyard_age_years',
        'production_size',
        'text_profile',
        'text_grape_growing',
        'text_winemaking',
        'text_more_about_the_wine',
        'text_pairing',
        'text_pairing_2',
    ];

    public function winery()
    {
        return $this->belongsTo('App\Models\Winery');
    }

    public function bottleSize()
    {
        return $this->belongsTo('App\Models\BottleSize');
    }

    public function packSize()
    {
        return $this->belongsTo('App\Models\PackSize');
    }

    public function wineType()
    {
        return $this->belongsTo('App\Models\WineType');
    }

    public function prices()
    {
        return $this->belongsToMany('App\Models\PriceType', 'wine_price')->withPivot('price')->withTimestamps();
    }

    public function grapes()
    {
        return $this->belongsToMany('App\Models\Grape', 'wine_grape')->withPivot('percentage');
    }

    public function getGrapesString()
    {
        $grapes = "";
        foreach($this->grapes as $key => $grape){
            $grapes .=  $grape->pivot->percentage . "% " . $grape->name;
            if($key < count($this->grapes)-1 ) {
                $grapes .= ", ";
            }
        }
        return $grapes;
    }

    public function getTransportArrangedPrice()
    {
        return $this->getPriceById(1);
    }

    public function getWholesalePrice()
    {
        return $this->getPriceById(2);
    }

    public function getWholesale3CasePrice()
    {
        return $this->getPriceById(6);
    }

    public function getWholesale5CasePrice()
    {
        return $this->getPriceById(7);
    }

    public function getD2CPrice()
    {
        return $this->getPriceById(3);
    }

    public function getExcellarPrice()
    {
        return $this->getPriceById(8);
    }

    public function getPriceById($id)
    {
        $pricePivotEntry = $this->prices()->where('price_type_id', $id)->first();
        if($pricePivotEntry){
            return $pricePivotEntry->pivot->price;
        }

        return;
    }

    public static function getWineBySlug($wineSlug)
    {
        return Wine::where('slug', $wineSlug)->first();
    }

    public static function getPublicWineBySlug($wineSlug)
    {
        $wine = Wine::where('slug', $wineSlug)->first();

        if ($wine && $wine->public) {
            return $wine;
        }
    }

    public static function getImagePublicLocation()
    {
        return url('/assets/img/_managed_content');
    }

    public function getWineImage()
    {
        return url('/assets/img/_managed_content') . "/" . $this->image_file;
    }

    // TODO: use Nova's built in cloner
    public function clone()
    {
        $originalWine = $this;

        $clonedWine = $originalWine->replicate();
        $clonedWine->public = 0; // Make private by default
        $clonedWine->public_wineclub = 0; // Make private by default
        $clonedWine->uuid = ""; 
        $clonedWine->name = "Copy of " . $originalWine->name;
        $clonedWine->nickname = "Copy of " . $originalWine->nickname;
        $clonedWine->save();

        /* Clone pivot table entries */
        // Grapes
        $grapes = $originalWine->grapes()->get();
        foreach ($grapes as $grape) {
            $clonedWine->grapes()->attach($grape->id, ['percentage' => $grape->pivot->percentage]);
        }

        // Prices
        $priceTypes = $originalWine->prices()->get();
        foreach ($priceTypes as $priceType) {
            $clonedWine->prices()->attach($priceType->id, ['price' => $priceType->pivot->price]);
        }

        // Duplicate image
        $originalFile = Storage::disk('managed_content')->path($originalWine->image_file);
        if ($originalWine->image_file && file_exists($originalFile)) {

            // break original image path into parts
            $newFileParts = pathinfo(Storage::disk('managed_content')->path($originalWine->image_file));
            $newFileExtension = $newFileParts['extension'];
            $newFilePath = $newFileParts['dirname'];

            // Create new filename and path
            $newFilenameWithExtension = Str::random(40) . "." . $newFileExtension;
            $newFile = Storage::disk('managed_content')->path($newFilenameWithExtension);

            // Make sure new filename doesn't already exist
            while (file_exists($newFile)) {
                $newFilenameWithExtension = Str::random(40) . "." . $newFileExtension;
                $newFile = Storage::disk('managed_content')->path($newFilenameWithExtension);
            }

            // Copy the file to the new location
            Storage::disk('managed_content')->copy($originalWine->image_file, $newFilenameWithExtension);

            // Update the file for the wine in database
            $clonedWine->image_file = $newFilenameWithExtension;
            $clonedWine->save();
        }

        return $clonedWine;
    }
}
