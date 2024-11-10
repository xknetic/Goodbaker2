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
        Schema::create('premix_ingredients', function (Blueprint $table) {
            $table->id('premixIngredientID');
            $table->float('unitQuantity');
            $table->string('unit',6);
            $table->float('variance');
            $table->unsignedBigInteger('rawMaterial');
            $table->unsignedBigInteger('premix');
            
            $table->foreign('premix')->references('premixID')->on('premixes')->onDelete('cascade');
            $table->foreign('rawMaterial')->references('rawMaterialID')->on('raw_materials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premix_ingredient');
    }
};
