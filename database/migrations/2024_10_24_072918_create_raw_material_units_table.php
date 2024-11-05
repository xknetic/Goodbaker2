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
        Schema::create('raw_material_units', function (Blueprint $table) {
            $table->id('rawMaterialUnitID');
            $table->string('unit', 20);
            $table->float('price');
            $table->integer('stock');
            $table->unsignedBigInteger('rawMaterial');

            $table->foreign('rawMaterial')->references('rawMaterialID')->on('raw_materials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_material_units');
    }
};
