<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('name'); // Part name
            $table->string('code')->nullable(); // Unique part code
            $table->string('type')->default('Parts'); // Default type
            $table->string('uom')->default('Pcs'); // Unit of Measurement
            $table->decimal('rate', 10, 2)->default(0.00);
            $table->decimal('sale_rate', 10, 2)->default(0.00);
            $table->decimal('purchase_rate', 10, 2)->default(0.00);
            $table->string('status')->default('ACTIVE'); // Default status
            $table->text('description')->nullable(); // Description (can be long)
            $table->string('group_name')->default('Parts'); // Default group
            $table->integer('hsn_code')->default(8708); // HSN Code
            $table->decimal('sgst', 5, 2)->default(0.00); // SGST tax
            $table->decimal('cgst', 5, 2)->default(0.00); // CGST tax
            $table->decimal('igst', 5, 2)->default(0.00); // IGST tax
            $table->decimal('vor_rate', 10, 2)->default(0.00); // VOR Rate
            $table->timestamps(); // Created_at & updated_at timestamps
        });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts');
    }
};
