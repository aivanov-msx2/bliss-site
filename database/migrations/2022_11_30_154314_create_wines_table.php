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
        Schema::create('wines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('uuid')->nullable();
            $table->string('nickname')->nullable;
            $table->string('vintage', 6)->nullable;
            $table->boolean('public')->default(1);
            $table->boolean('public_wineclub')->default(1);
            $table->boolean('hide_from_dist_price_book')->default(0);
            $table->boolean('hide_from_wholesale_price_book')->default(0);
            $table->string('slug')->nullable();
            $table->foreignId('winery_id')->constrained('wineries');
            $table->string('appellation')->nullable();
            $table->string('vineyard_designation')->nullable();
            $table->tinyInteger('sort_order')->default(0);
            $table->boolean('show_fob_in_pb')->default(1);
            $table->foreignId('bottle_size_id')->constrained('bottle_sizes')->nullable();
            $table->foreignId('wine_type_id')->constrained('wine_types')->nullable();
            $table->foreignId('pack_size_id')->constrained('pack_sizes')->nullable();
            $table->float('weight')->default(3.5);
            $table->float('alc')->nullable();
            $table->float('ph')->nullable();
            $table->string('sugar')->default('dry')->nullable();
            $table->string('acid')->nullable();
            $table->string('tannin')->nullable();
            $table->string('ta')->nullable();
            $table->string('rs')->nullable();
            $table->string('sulfur')->nullable();
            $table->string('soil')->nullable();
            $table->string('altitude')->nullable();
            $table->string('vineyard_age_years')->nullable();
            $table->string('production_size')->nullable();
            $table->string('image_file')->nullable();
            $table->string('icon_file')->nullable();
            $table->string('label_file')->nullable();
            $table->text('text_profile')->nullable();
            $table->text('text_grape_growing')->nullable();
            $table->text('text_winemaking')->nullable();
            $table->text('text_more_about_the_wine')->nullable();
            $table->text('text_pairing')->nullable();
            $table->text('text_pairing_2')->nullable();
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
        Schema::dropIfExists('wines');
    }
};
