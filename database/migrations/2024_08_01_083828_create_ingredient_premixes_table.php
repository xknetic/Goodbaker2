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
        Schema::create('ingredient_premixes', function (Blueprint $table) {
            $table->id('ingredientPremixID');
            $table->integer('quantity');
            $table->unsignedBigInteger('product');
            $table->unsignedBigInteger('premix');

            $table->foreign('product')->references('productID')->on('products')->onDelete('cascade');
            $table->foreign('premix')->references('premixID')->on('premixes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_premix');
    }
};
