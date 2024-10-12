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
        Schema::create('purchase_returns', function (Blueprint $table) {
            $table->id('returnID');
            $table->unsignedBigInteger('badOrder');
            $table->unsignedBigInteger('salesID');

            $table->foreign('badOrder')->references('bOID')->on('bad_orders')->onDelete('cascade');
            $table->foreign('salesID')->references('salesID')->on('sales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_returns');
    }
};
