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
        Schema::create('ingredient_raw_materials', function (Blueprint $table) {
            $table->id('productIngredientRawMaterialID');
            $table->integer('quantity');
            $table->unsignedBigInteger('product');
            $table->unsignedBigInteger('rawMaterial');

            $table->foreign('product')->references('productID')->on('products')->onDelete('cascade');
            $table->foreign('rawMaterial')->references('rawMaterialID')->on('raw_materials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_raw_material');
    }
};
