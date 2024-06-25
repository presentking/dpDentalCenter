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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('last_name', 45)->nullable();
            $table->string('first_name', 45)->nullable();
            $table->string('father_name', 45)->nullable();
            $table->string('number_phone', 11)->nullable();
            $table->tinyInteger('role')->default(1);
            $table->string('work_experience')->nullable();
            $table->string('education')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('residence_address')->nullable();
            $table->string('path_img')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
