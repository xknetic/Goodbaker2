<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('replenish_premixes', function (Blueprint $table) {
            $table->id('replenishPremixID');
            $table->datetime('date')->useCurrent();
            $table->integer('quantity');
            $table->unsignedBigInteger('premixIngredient');

            $table->foreign('premixIngredient')->references('premixIngredientID')->on('premix_ingredients')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replenish_premixes');
    }
};
