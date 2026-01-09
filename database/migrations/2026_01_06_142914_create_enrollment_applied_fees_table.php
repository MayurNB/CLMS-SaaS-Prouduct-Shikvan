<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enrollment_applied_fees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('enrollment_id')->index();
            $table->string('fee_type'); // 'common' or 'extra'
            $table->string('fee_name'); // Snapshot of the name
            $table->decimal('fee_amount', 15, 2); // Snapshot of the price
            $table->timestamps(); // includes created_at (dates)

            // Foreign key to enrollments
            $table->foreign('enrollment_id')
                  ->references('id')
                  ->on('enrollments')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrollment_applied_fees');
    }
};