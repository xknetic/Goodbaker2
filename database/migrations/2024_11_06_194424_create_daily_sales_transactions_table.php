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
        Schema::create('daily_sales_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('StoreName', 100);
            $table->date('LogDate');
            $table->string('LogDay', 20);
            $table->time('LogTime');
            $table->integer('TransactionNo');
            $table->integer('TerminalNo');
            $table->string('CustomerName', 50)->nullable();
            $table->string('ProductCode', 50);
            $table->string('ProductDescription', 100);
            $table->string('Category', 25)->nullable();
            $table->integer('TotalQTY');
            $table->string('UOM', 20); 
            $table->float('Price');
            $table->float('GrossSales'); 
            $table->float('SalesReturns');
            $table->float('SalesREGDISC');
            $table->float('SalesSCDISC');
            $table->float('SalesPWDDISC');
            $table->float('VATEXEMPT');
            $table->float('NETSALES');
            $table->string('VATNONVAT');
            $table->unsignedBigInteger('branch')->nullable();
            
            $table->foreign('branch')->references('branchID')->on('branches')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_sales_transactions');
    }
};
