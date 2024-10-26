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
        //
        Schema::create('branch_premixes', function (Blueprint $table) {
            $table->id('branchPremixID');
            $table->string('premixName', 25);
            $table->string('category', 25);
            $table->string('size', 25);
            $table->unsignedBigInteger('branch');
            $table->foreign('branch')->references('branchID')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('branch_premixes');
    }
};
