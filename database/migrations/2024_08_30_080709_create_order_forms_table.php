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
        Schema::create('order_forms', function (Blueprint $table) {
            $table->id('orderID');
            $table->string('customerName', 60);
            $table->string('customerAddress', 100);
            $table->string('customerContact');
            $table->date('orderDate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_forms');
    }
};
