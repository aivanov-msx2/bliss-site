<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wineries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('region_id')->constrained('regions');
            $table->boolean('public')->default(0);
            $table->boolean('hide_from_dist_price_book')->default(0);
            $table->boolean('hide_from_wholesale_price_book')->default(0);
            $table->string('slug')->nullable();
            $table->string('winemaker_full_name')->nullable();
            $table->string('winemaker_first_name')->nullable();
            $table->string('winemaker_image_file')->nullable();
            $table->string('winery_image_file')->nullable();
            $table->text('winemaker_long_description')->nullable();
            $table->text('winemaker_philosophy')->nullable();
            $table->text('total_winery_production')->nullable();
            $table->text('vineyard_size')->nullable();
            $table->text('something_random')->nullable();
            $table->text('farming')->nullable();
            $table->text('certification')->nullable();
            $table->text('grapes_planted_red')->nullable();
            $table->text('grapes_planted_white')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wineries');
    }
};
