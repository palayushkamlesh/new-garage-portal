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
        Schema::create('job_part', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('part_id');
            $table->integer('quantity')->default(1);
            $table->decimal('rate', 10, 2)->nullable();       // fetched from parts table
            $table->decimal('sale_rate', 10, 2);
            $table->decimal('cgst', 5, 2);
            $table->decimal('sgst', 5, 2);
            $table->decimal('igst', 5, 2);
            $table->decimal('total', 10, 2);
            $table->string('uom')->nullable();
            $table->string('hsn_code')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_part');
    }
};
