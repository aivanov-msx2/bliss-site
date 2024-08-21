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
        // TODO: remove WinePrice model and controller??
        Schema::create('wine_price', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wine_id')->constrained('wines');
            $table->foreignId('price_type_id')->constrained('price_types');
            $table->float('price')->default(0);
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
        Schema::dropIfExists('wine_price');
    }
};
