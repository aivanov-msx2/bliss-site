<?php

namespace App\Exports;

use App\Models\WinePrice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class WinePricesExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    public function collection()
    {
        return WinePrice::all();
    }

    public function map($winePrice): array
    {
        return [
            $winePrice->id,
            $winePrice->wine->name,
            $winePrice->wine_id,
            $winePrice->price_type_id,
            $winePrice->price,
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'wine (for reference only)',
            'wine_id',
            'price_type_id',
            'price',
        ];
    }
}

?>