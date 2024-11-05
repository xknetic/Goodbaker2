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
        Schema::create('premixes', function (Blueprint $table) {
            $table->id('premixID');
            $table->string('premixName', 25);
            $table->string('category', 25)->nullable();
            $table->string('size', 25)->nullable();
            $table->integer('quantity')->nullable();
            $table->float('cost');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premixes');
    }
};
