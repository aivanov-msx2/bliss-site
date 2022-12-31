<?php

namespace App\Imports;

use App\Models\BottleSize;
use App\Models\PackSize;
use App\Models\Wine;
use App\Models\WineType;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WinesImport implements ToCollection, WithHeadingRow
{

    private $bottleSizes;
    private $wineTypes;
    private $packSizes;

    public function __construct()
    {
        $this->bottleSizes = BottleSize::select('id', 'ml')->get();
        $this->wineTypes = WineType::select('id', 'name')->get();
        $this->packSizes = PackSize::select('id', 'bottles')->get();
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {

            // TODO: Quit here. Test bulk editing more thoroughly.

            $bottleSize = $this->bottleSizes->where('ml', $row['bottle_size'])->first();
            $wineType = $this->wineTypes->where('name', $row['wine_type'])->first();
            $packSize = $this->packSizes->where('bottles', $row['pack_size'])->first();

            Wine::updateOrCreate(
                [
                    'id' => $row['id'],
                ],
                [
                    'winery_id'  => $row['winery_id'],
                    'name'  => $row['name'],
                    'uuid'  => $row['uuid'],
                    'nickname'  => $row['nickname'],
                    'vintage'  => $row['vintage'],
                    'public'  => strtolower($row['public']) === "yes" ? 1 : 0,
                    'hide_from_dist_price_book'  => strtolower($row['hide_from_dist_price_book']) === 'yes' ? 1 : 0,
                    'hide_from_wholesale_price_book'  => strtolower($row['hide_from_wholesale_price_book']) === 'yes' ? 1 : 0,
                    'slug'  => $row['slug'],
                    'appellation'  => $row['appellation'],
                    'vineyard_designation'  => $row['vineyard_designation'],
                    'sort_order'  => $row['sort_order'] ?? 0,
                    'bottle_size_id'  => $bottleSize->id ?? $this->bottleSizes[0]->id,
                    'wine_type_id'  => $wineType->id ?? $this->wineTypes[0]->id,
                    'pack_size_id'  => $packSize->id ?? $this->packSizes[0]->id,
                    'weight'  => $row['weight'],
                    'alc'  => $row['alc'],
                    'ph'  => $row['ph'],
                    'sugar'  => $row['sugar'],
                    'tannin'  => $row['tannin'],
                    'ta'  => $row['ta'],
                    'rs'  => $row['rs'],
                    'sulfur'  => $row['sulfur'],
                    'soil'  => $row['soil'],
                    'altitude'  => $row['altitude'],
                    'vineyard_age_years'  => $row['vineyard_age_years'],
                    'production_size'  => $row['production_size'],
                    'text_profile'  => $row['text_profile'],
                    'text_grape_growing'  => $row['text_grape_growing'],
                    'text_winemaking'  => $row['text_winemaking'],
                    'text_more_about_the_wine'  => $row['text_more_about_the_wine'],
                    'text_pairing'  => $row['text_pairing'],
                    'text_pairing_2'  => $row['text_pairing_2'],
                ]
            );
        }
    }

  
}
