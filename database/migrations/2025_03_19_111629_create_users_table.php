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
            $table->string('name'); // name - VARCHAR(255) NOT NULL
            $table->string('email')->unique(); // email - VARCHAR(255) UNIQUE NOT NULL
            $table->timestamp('email_verified_at')->nullable();
            $table->text('address')->nullable(); // address - TEXT NULL
            $table->string('password'); // password - VARCHAR(255) NOT NULL
            $table->string('phone', 20)->nullable(); // phone - VARCHAR(20) NULL
            $table->enum('role', ['user', 'admin'])->default('user'); // role - ENUM ('user', 'admin') DEFAULT 'user'
            $table->string('profile_image')->nullable(); // profile_image - VARCHAR, nullable
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
