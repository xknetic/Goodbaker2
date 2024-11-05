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
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id('purchaseItemID');
            $table->unsignedBigInteger('purchaseID');
            $table->unsignedBigInteger('rawMaterialID');
            $table->integer('quantity');
            $table->unsignedBigInteger('unit');

            $table->foreign('purchaseID')->references('purchaseID')->on('purchases')->onDelete('cascade');
            $table->foreign('rawMaterialID')->references('rawMaterialID')->on('raw_materials')->onDelete('cascade');
            $table->foreign('unit')->references('rawMaterialUnitID')->on('raw_material_units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};
