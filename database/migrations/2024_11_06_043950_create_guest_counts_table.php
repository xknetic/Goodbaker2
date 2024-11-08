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
        Schema::create('guest_counts', function (Blueprint $table) {
            $table->id();
            $table->string('StoreName', 100);
            $table->date('Date');
            $table->string('Day', 20);
            $table->time('Time')->nullable();
            $table->string('TransactionType', 50)->nullable();
            $table->integer('TransactionNo');
            $table->integer('GuestCount');
            $table->float('GrossAmount');
            $table->float('Return');
            $table->float('RegularDiscount');
            $table->float('SeniorDiscount');
            $table->float('PWDDiscount');
            $table->float('VatExempt');
            $table->float('NetAmount');
            $table->unsignedBigInteger('branch')->nullable();
            
            $table->foreign('branch')->references('branchID')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_counts');
    }
};
