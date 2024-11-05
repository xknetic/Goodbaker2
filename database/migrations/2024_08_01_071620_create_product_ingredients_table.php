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
        Schema::create('product_ingredients', function (Blueprint $table) {
            $table->id('productIngredientID');
            $table->integer('quantity');
            $table->unsignedBigInteger('product');
            $table->unsignedBigInteger('rawMaterial')->nullable();
            $table->unsignedBigInteger('premix')->nullable();
            $table->float('variance')->nullable();

            $table->foreign('product')->references('productID')->on('products')->onDelete('cascade');
            $table->foreign('rawMaterial')->references('rawMaterialID')->on('raw_materials')->onDelete('cascade');
            $table->foreign('premix')->references('premixID')->on('premixes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_ingredients');
    }
};
