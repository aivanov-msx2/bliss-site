<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinePrice extends Model
{
    use HasFactory;

        /* Pivot Table */

        protected $table = 'wine_price';

        public function wine()
        {
            return $this->belongsTo('App\Models\Wine');
        }
    
        public function priceType()
        {
            return $this->belongsTo('App\Models\PriceType');
        }
}
