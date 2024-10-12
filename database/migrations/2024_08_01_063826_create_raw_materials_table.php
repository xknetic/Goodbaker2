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
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id('rawMaterialID');
            $table->string('rawMaterialName', 25);
            $table->string('container', 25);
            $table->string('unit', 25);
            $table->float('price');
            $table->integer('quantity');
            $table->unsignedBigInteger('supplierID');

            $table->foreign('supplierID')->references('supplierID')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_materials');
    }
};
