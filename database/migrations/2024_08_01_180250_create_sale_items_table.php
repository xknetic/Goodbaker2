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
        Schema::create('sale_items', function (Blueprint $table) {
            $table->id('salesItemID');
            $table->unsignedBigInteger('salesID');
            $table->unsignedBigInteger('truckLoadItem')->nullable();
            $table->integer('quantity');

            $table->foreign('truckLoadItem')->references('truckLoadItemID')->on('truck_load_items')->onDelete('cascade');
            $table->foreign('salesID')->references('salesID')->on('sales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_items');
    }
};
