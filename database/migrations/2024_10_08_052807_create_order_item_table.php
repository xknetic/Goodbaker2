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
        Schema::create('order_item', function (Blueprint $table) {
            $table->id('orderItemID');
            $table->integer('quantity');
            $table->unsignedBigInteger('orderID');
            $table->unsignedBigInteger('productID');

            $table->foreign('orderID')->references('orderID')->on('order_forms')->onDelete('cascade');
            $table->foreign('productID')->references('productID')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item');
    }
};
