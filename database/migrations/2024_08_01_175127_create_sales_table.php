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
<<<<<<< HEAD
            $table->datetime('salesDate');
            $table->string('salesStatus', 15)->nullable();
=======
            $table->dateTime('salesDate');
            $table->string('salesStatus', 15);
>>>>>>> ccf9f6e (8/11)
            $table->unsignedBigInteger('deliveryID')->nullable();
            $table->unsignedBigInteger('userName');

            $table->foreign('deliveryID')->references('deliveryID')->on('deliveries')->onDelete('cascade');
            $table->foreign('userName')->references('id')->on('users')->onDelete('cascade');
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
