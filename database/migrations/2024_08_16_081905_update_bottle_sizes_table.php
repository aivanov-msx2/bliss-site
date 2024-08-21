<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateBottleSizesTable extends Migration
{
    public function up()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Drop the bottle_sizes_new table if it exists
        Schema::dropIfExists('bottle_sizes_new');

        // Create a new table with the desired structure
        Schema::create('bottle_sizes_new', function (Blueprint $table) {
            $table->id();
            $table->string('ml', 10);
            $table->timestamps();
        });

        // Copy data from the old table to the new one, if it exists
        if (Schema::hasTable('bottle_sizes')) {
            $columns = Schema::getColumnListing('bottle_sizes');
            
            if (in_array('created_at', $columns) && in_array('updated_at', $columns)) {
                DB::statement("INSERT INTO bottle_sizes_new (id, ml, created_at, updated_at) 
                               SELECT id, CONCAT(ml, ' mL'), created_at, updated_at 
                               FROM bottle_sizes");
            } else {
                DB::statement("INSERT INTO bottle_sizes_new (id, ml, created_at, updated_at) 
                               SELECT id, CONCAT(ml, ' mL'), NOW(), NOW() 
                               FROM bottle_sizes");
            }

            // Drop the old table
            Schema::drop('bottle_sizes');
        }

        // Rename the new table to the original name
        Schema::rename('bottle_sizes_new', 'bottle_sizes');

        // Delete existing entries
        DB::table('bottle_sizes')->delete();

        // Reset auto-increment
        DB::statement('ALTER TABLE bottle_sizes AUTO_INCREMENT = 1');

        // Insert new data
        DB::table('bottle_sizes')->insert([
            ['id' => 1, 'ml' => '375 mL', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'ml' => '500 mL', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'ml' => '750 mL', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'ml' => '1000 mL', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'ml' => '1500 mL', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Update wines table to match new bottle size IDs
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

        // Log the results
        $results = DB::table('wines')
            ->select('bottle_size_id', DB::raw('COUNT(*) as count'))
            ->groupBy('bottle_size_id')
            ->orderBy('bottle_size_id')
            ->get();

        foreach ($results as $result) {
            \Log::info("Updated bottle size ID {$result->bottle_size_id}: {$result->count} wines");
        }

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function down()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Revert wines table to original bottle size IDs
        $reverseMapping = [
            1 => 3, // 375 mL
            2 => 5, // 500 mL
            3 => 1, // 750 mL
            4 => 2, // 1000 mL
            5 => 4, // 1500 mL
        ];

        foreach ($reverseMapping as $new => $old) {
            DB::table('wines')
                ->where('bottle_size_id', $new)
                ->update(['bottle_size_id' => $old]);
        }

        // Revert bottle_sizes table to original structure and data
        Schema::dropIfExists('bottle_sizes');
        Schema::create('bottle_sizes', function (Blueprint $table) {
            $table->id();
            $table->integer('ml');
            $table->timestamps();
        });

        DB::table('bottle_sizes')->insert([
            ['id' => 3, 'ml' => 375, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'ml' => 500, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 1, 'ml' => 750, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'ml' => 1000, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'ml' => 1500, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
