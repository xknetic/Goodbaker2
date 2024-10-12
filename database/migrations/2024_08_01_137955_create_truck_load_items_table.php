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
        Schema::create('truck_load_items', function (Blueprint $table) {
            $table->id('truckLoadItemID');
            $table->unsignedBigInteger('truckLoadID');
            $table->unsignedBigInteger('product');
            $table->integer('quantity');

            $table->foreign('truckLoadID')->references('truckLoadID')->on('truck_loads')->onDelete('cascade');
            $table->foreign('product')->references('productID')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truck_load_items');
    }
};
