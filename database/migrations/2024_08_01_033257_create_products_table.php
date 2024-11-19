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
        Schema::create('products', function (Blueprint $table) {
            $table->id('productID');
            $table->unsignedBigInteger('productCategory');
            $table->string('productName', 50);
            $table->string('productCode', 50)->nullable();
            $table->string('unit', 25);
            $table->integer('quantity');
            $table->integer('criticalLevel')->nullable();

            $table->foreign('productCategory')->references('categoryID')->on('product_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
