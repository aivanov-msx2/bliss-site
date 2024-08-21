<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateWineBottleSizes extends Migration
{
    public function up()
    {
        // Define the mapping of old IDs to new IDs
        $mapping = [
            1 => 3, // 750 mL
            2 => 4, // 1000 mL
            3 => 1, // 375 mL
            4 => 5, // 1500 mL
            5 => 2, // 500 mL
        ];

        // Update each wine's bottle_size_id based on the mapping
        foreach ($mapping as $oldId => $newId) {
            DB::statement("UPDATE wines SET bottle_size_id = ? WHERE bottle_size_id = ?", [$newId, $oldId]);
        }

        // Log the changes
        $results = DB::select("SELECT bottle_size_id, COUNT(*) as count FROM wines GROUP BY bottle_size_id ORDER BY bottle_size_id");
        foreach ($results as $result) {
            \Log::info("Bottle size ID {$result->bottle_size_id}: {$result->count} wines");
        }
    }

    public function down()
    {
        // Define the reverse mapping if you need to revert changes
        $reverseMapping = [
            3 => 1, // 750 mL
            4 => 2, // 1000 mL
            1 => 3, // 375 mL
            5 => 4, // 1500 mL
            2 => 5, // 500 mL
        ];

        // Revert each wine's bottle_size_id based on the reverse mapping
        foreach ($reverseMapping as $newId => $oldId) {
            DB::statement("UPDATE wines SET bottle_size_id = ? WHERE bottle_size_id = ?", [$oldId, $newId]);
        }
    }
}
