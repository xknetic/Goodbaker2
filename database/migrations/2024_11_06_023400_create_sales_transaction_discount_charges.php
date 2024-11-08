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
        Schema::create('sales_transaction_discount_charges', function (Blueprint $table) {
            $table->id();
            $table->integer('Terminal');
            $table->string('UserName', 50);
            $table->dateTime('TranDate');
            $table->integer('TranNo');
            $table->float('Discount');
            $table->float('Allowance');
            $table->float('Charge');
            $table->float('PesoCharge');
            $table->unsignedBigInteger('branch')->nullable();
            
            $table->foreign('branch')->references('branchID')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_transaction_discount_charges');
    }
};
