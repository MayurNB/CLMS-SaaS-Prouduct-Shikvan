<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('discounts_offers', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            $table->string('name', 255)->nullable(false)->default('');
            $table->text('description_public')->nullable(); // What clients see
            $table->text('description_internal')->nullable(); // Internal remarks for OE/staff

            $table->string('type', 50)->nullable(false); // e.g., 'percentage', 'fixed_amount'
            $table->decimal('value', 10, 2)->nullable(false)->default(0.00); // The discount value (e.g., 10 for 10%, 50.00 for $50)

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('is_active')->default(1);

            // Optional: Link to a specific program or course if the discount is not global
            $table->char('program_id', 36)->nullable()->index();
            $table->char('course_id', 36)->nullable()->index();

            // Foreign key for audit trail
            $table->char('created_by_user_id', 36)->index();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('set null');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts_offers');
    }
};