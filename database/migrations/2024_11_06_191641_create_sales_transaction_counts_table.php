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
        Schema::create('sales_transaction_counts', function (Blueprint $table) {
            $table->id();
            $table->integer('Terminal');
            $table->float('Amount'); 
            $table->integer('SalesCount');
            $table->unsignedBigInteger('branch')->nullable();
            
            $table->foreign('branch')->references('branchID')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_transaction_counts');
    }
};
