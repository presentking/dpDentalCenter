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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('snils')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('last_name', 45)->nullable();
            $table->string('first_name', 45)->nullable();
            $table->string('father_name', 45)->nullable();
            $table->string('phone', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
