<?php

namespace App\Imports;

use App\Models\WinePrice;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class WinePricesImport implements ToCollection, WithHeadingRow, WithValidation
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

    public function rules(): array
    {
        return [
            'id' => 'required',
            'wine_id' => 'required|exists:wines,id',
            'price_type_id' => 'required|exists:price_types,id',
            'price' => 'required|numeric|min:0',
        ];
    }
}
