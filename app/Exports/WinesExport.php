<?php

namespace App\Exports;

use App\Models\Wine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class WinesExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    public function collection()
    {
        return Wine::all();
    }

    public function map($wine): array
    {
        return [
            $wine->winery->id,
            $wine->winery->name,
            $wine->id,
            $wine->name,
            $wine->uuid,
            $wine->nickname,
            $wine->vintage,
            $wine->public ? 'yes' : '',
            $wine->hide_from_dist_price_book ? 'yes' : '',
            $wine->hide_from_wholesale_price_book ? 'yes' : '',
            $wine->slug,
            $wine->appellation,
            $wine->vineyard_designation,
            $wine->sort_order,
            $wine->bottleSize->ml,
            $wine->wineType->name,
            $wine->packSize->bottles,
            $wine->weight,
            $wine->alc,
            $wine->ph,
            $wine->sugar,
            $wine->tannin,
            $wine->ta,
            $wine->rs,
            $wine->sulfur,
            $wine->soil,
            $wine->altitude,
            $wine->vineyard_age_years,
            $wine->production_size,
            $wine->text_profile,
            $wine->text_grape_growing,
            $wine->text_winemaking,
            $wine->text_more_about_the_wine,
            $wine->text_pairing,
            $wine->text_pairing_2,
        ];
    }

    public function headings(): array
    {
        return [
            'winery_id',
            'winery (for reference, not editable)',
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
            'bottle_size',
            'wine_type',
            'pack_size',
            'weight',
            'alc',
            'ph',
            'sugar',
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
    }
}

?>