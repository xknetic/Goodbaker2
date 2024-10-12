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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id('truckID');
            $table->string('plateNumber', 7);
            $table->unsignedBigInteger('truckDriver');
            $table->unsignedBigInteger('truckAgent');

            // Foreign key constraints
            $table->foreign('truckDriver')->references('driverID')->on('drivers')->onDelete('cascade');
            // $table->foreign('truckAgent')->references('id')->on('user_table')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
