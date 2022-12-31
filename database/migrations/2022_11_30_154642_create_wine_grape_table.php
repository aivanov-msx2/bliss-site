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
        // TODO: remove WineGrape model and controller
        Schema::create('wine_grape', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wine_id')->constrained('wines');
            $table->foreignId('grape_id')->constrained('grapes');
            $table->float('percentage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wine_grape');
    }
};
