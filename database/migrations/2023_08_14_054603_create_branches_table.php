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
        Schema::create('branches', function (Blueprint $table) {
            $table->id('branchID');
            $table->string('branchName', 25);
<<<<<<< HEAD
            $table->unsignedBigInteger('contactPerson')->nullable();
            $table->string('contact', 11)->nullable();
=======
            $table->unsignedBigInteger('contactPerson');
            $table->string('contact', 11);
>>>>>>> ccf9f6e (8/11)

            $table->foreign('contactPerson')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
