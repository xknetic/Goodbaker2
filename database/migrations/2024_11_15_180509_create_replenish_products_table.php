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
        Schema::create('replenish_products', function (Blueprint $table) {
            $table->id('replenishProductID');
            $table->datetime('date')->useCurrent();
            $table->integer('quantity');
            $table->unsignedBigInteger('product');

            $table->foreign('product')->references('productID')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replenish_products');
    }
};
