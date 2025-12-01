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
        Schema::create('enrollment_fees', function (Blueprint $table) {
    $table->char('id', 36)->primary();
    $table->char('enrollment_id', 36)->unique()->comment('FK to enrollments table');

    $table->decimal('total_fee_charged', 10, 2)->default(0.00); // The final price for this student
    $table->decimal('paid_amount', 10, 2)->default(0.00);
    $table->decimal('discount_applied', 10, 2)->default(0.00);

    $table->string('fee_status', 50)->default('partial'); // partial, paid, defaulted
    
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_fees');
    }
};
