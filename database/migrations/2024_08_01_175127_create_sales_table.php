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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('salesID');
            $table->dateTime('salesDate');
            $table->unsignedBigInteger('client');
            $table->unsignedBigInteger('truck');
            $table->unsignedBigInteger('userName');
            $table->string('salesStatus', 15);

            $table->foreign('client')->references('clientID')->on('clients')->onDelete('cascade');
            $table->foreign('truck')->references('truckID')->on('deliveries')->onDelete('cascade');
            // $table->foreign('userName')->references('id')->on('users_table')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
