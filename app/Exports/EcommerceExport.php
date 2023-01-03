<?php

namespace App\Exports;

use App\Models\Wine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class EcommerceExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    public function collection()
    {
        return Wine::all();
    }

    public function map($wine): array
    {

        $wineImgUrl = url('assets/img/_managed_content/' . $wine->image_file);

        return [
            $wine->nickname,
            "Wine",
            $wine->winery->name,
            "Wine a la Carte",
            $wine->winery->region->country->name,
            "", // leave blank
            $wine->text_profile,
            $wineImgUrl,
            $wine->uuid,
            "Bottle",
            $wine->weight,
            $wine->getD2CPrice(),
            $wine->vineyard_designation,
            $wine->bottleSize->ml,
            $wine->vintage,
            $wine->winery->region->name,
            $wine->appellation,
            $wine->wineType->name,
            $wine->getGrapesString(),
            $wine->packSize->bottles,
            "", // leave blank
            "", // leave blank
            "", // leave blank
            "", // leave blank
            $wine->sugar,
            $wine->acid,
            $wine->ph,
            "", // leave blank
            "", // leave blank
            "", // leave blank
            $wine->rs,
            $wine->tannin,
            $wine->alc,
            "", // leave blank
            "", // leave blank
            "", // leave blank
            "", // leave blank
            "", // leave blank
            "", // leave blank
            $wine->text_pairing,
            $wine->text_pairing_2,
        ];
    }

    public function headings(): array
    {
        return [
            'ProductTitle',
            'ProductType',
            'Brand',
            'DepartmentCode',
            'SubDepartmentCode',
            'Teaser',
            'Description',
            'Photo',
            'SKU',
            'UnitDescription',
            'Weight',
            'Price',
            'VineyardDesignation',
            'BottleSizeInML',
            'Vintage',
            'Region',
            'Appellation',
            'WineType',
            'Varietal',
            'BottlesInACase',
            'WSRating',
            'RPRating',
            'WERating',
            'HarvestDate',
            'Sugar',
            'Acid',
            'PH',
            'Aging',
            'Fermentation',
            'BottlingDate',
            'ResidualSugar',
            'Tannin',
            'AlcoholPercentage',
            'TastingNotes',
            'Ratings',
            'Awards',
            'VineyardNotes',
            'ProductionNotes',
            'WinemakerNotes',
            'FoodPairing',
            'OtherNotes',
        ];
    }
}

?>