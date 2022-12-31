<?php

namespace App\Imports;

use App\Models\WinePrice;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WinePricesImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {

            WinePrice::updateOrCreate(
                [
                    'id' => $row['id'],
                ],
                [
                    'wine_id'  => $row['wine_id'],
                    'price_type_id'  => $row['price_type_id'],
                    'price'  => $row['price'],
                ]
            );
        }
    }
}
