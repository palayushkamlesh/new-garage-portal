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
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id'); // Foreign Key: customers
            $table->unsignedBigInteger('car_id'); // Foreign Key: cars
            $table->enum('type', ['accident', 'regular', 'special']); // Job type
            $table->string('insurance_company')->nullable(); // Insurance provider
            $table->string('policy_number')->nullable(); // Policy number
            $table->timestamp('start_time')->nullable(); // Job start time
            $table->timestamp('end_time')->nullable(); // Job end time
            $table->timestamp('expected_delivery')->nullable(); // Expected delivery date
            $table->enum('status', ['pending', 'in-progress', 'completed', 'delivered'])->default('pending'); // Job status
            $table->text('remarks')->nullable(); // Additional job notes
            $table->unsignedBigInteger('employee_id'); // Foreign Key: employees
            $table->unsignedBigInteger('gst_id'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
