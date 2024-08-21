<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateWinesBottleSizes extends Migration
{
    public function up()
    {
        // Create a temporary mapping of old to new IDs
        $mapping = [
            3 => 1, // 375 mL
            5 => 2, // 500 mL
            1 => 3, // 750 mL
            2 => 4, // 1000 mL
            4 => 5, // 1500 mL
        ];

        foreach ($mapping as $old => $new) {
            DB::table('wines')
                ->where('bottle_size_id', $old)
                ->update(['bottle_size_id' => $new]);
        }
    }

    public function down()
    {
        // Reverse mapping if needed
        $reverseMapping = [
            1 => 3,
            2 => 5,
            3 => 1,
            4 => 2,
            5 => 4,
        ];

        foreach ($reverseMapping as $new => $old) {
            DB::table('wines')
                ->where('bottle_size_id', $new)
                ->update(['bottle_size_id' => $old]);
        }
    }
}
