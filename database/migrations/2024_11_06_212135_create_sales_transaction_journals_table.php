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
        Schema::create('sales_transaction_journals', function (Blueprint $table) {
            $table->id();
            $table->integer('StoreCode');
            $table->dateTime('SalesDate');
            $table->integer('TransactionNo');
            $table->string('CustomerName', 50)->nullable();
            $table->string('BarCode', 50);
            $table->string('SKU', 100);
            $table->string('VatOrNonVAt', 20);
            $table->integer('QTY');
            $table->string('UOM', 20);
            $table->float('UnitPrice');
            $table->float('Amount');
            $table->float('Charges');
            $table->float('DiscountsOrAllowance');
            $table->float('SalesReturns');
            $table->float('VatAmount')->nullable();
            $table->integer('NetAmt');
            $table->unsignedBigInteger('branch')->nullable();
            
            $table->foreign('branch')->references('branchID')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_transaction_journals');
    }
};
