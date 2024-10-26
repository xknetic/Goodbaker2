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
        Schema::create('transfer_items', function (Blueprint $table) {
            $table->id('tranferItemID');
            $table->unsignedBigInteger('product')->nullable();
            $table->unsignedBigInteger('premix')->nullable();
            $table->unsignedBigInteger('rawMaterial')->nullable();
            $table->integer('quantity');
            $table->unsignedBigInteger('transferID');

            $table->foreign('product')->references('productID')->on('products')->onDelete('cascade');
            $table->foreign('premix')->references('premixID')->on('premixes')->onDelete('cascade');
            $table->foreign('rawMaterial')->references('rawMaterialID')->on('raw_materials')->onDelete('cascade');
            $table->foreign('transferID')->references('transferID')->on('transfers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_products');
    }
};
