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
        Schema::create('truck_loads', function (Blueprint $table) {
            $table->id('truckLoadID');
            $table->dateTime('loadDate');
            $table->unsignedBigInteger('truck');

            $table->foreign('truck')->references('truckID')->on('deliveries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truck_loads');
    }
};
