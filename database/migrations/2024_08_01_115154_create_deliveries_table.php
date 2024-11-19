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
            $table->timestamps();
            $table->id('deliveryID');
            $table->date('salesDate');
            $table->unsignedBigInteger('truck');
            $table->unsignedBigInteger('saleType');
            $table->unsignedBigInteger('truckDriver');
            $table->unsignedBigInteger('client')->nullable();
            $table->unsignedBigInteger('agent');
            $table->string('route', 50)->nullable();
            $table->string('status', 50)->nullable()->default('Pending');
            // $table->unsignedBigInteger('truckAgent');

            // Foreign key constraints
            $table->foreign('truck')->references('truckID')->on('trucks')->onDelete('cascade');
            $table->foreign('truckDriver')->references('driverID')->on('drivers')->onDelete('cascade');
            $table->foreign('saleType')->references('saleTypeID')->on('sale_types')->onDelete('cascade');
            $table->foreign('client')->references('clientID')->on('clients')->onDelete('cascade');
            $table->foreign('agent')->references('id')->on('users')->onDelete('cascade');
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
