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
<<<<<<< HEAD
            $table->string('rawMaterialName', 50);
            $table->string('type', 25);
            $table->string('typeQuantity', 25);
=======
            $table->string('rawMaterialName', 25);
            $table->string('type', 25);
            $table->string('typeQuantity', 25);
            $table->string('unit', 25);
            $table->float('price');
            $table->integer('quantity');
>>>>>>> ccf9f6e (8/11)
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
