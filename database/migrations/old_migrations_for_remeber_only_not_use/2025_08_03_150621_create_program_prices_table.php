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
        Schema::create('program_prices', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // Link to either a program OR a course (polymorphic relationship, or separate FKs)
            // For simplicity, we'll use nullable FKs to both.
            $table->char('program_id', 36)->nullable()->index();
            $table->char('course_id', 36)->nullable()->index();

            // Ensure only one of program_id or course_id is set for a given price entry
            // This is application logic, but can be enforced with a check constraint (more complex in Laravel migrations)
            // $table->check('program_id IS NOT NULL OR course_id IS NOT NULL');
            // $table->check('NOT (program_id IS NOT NULL AND course_id IS NOT NULL)');

            $table->string('price_type', 50)->nullable(false); // e.g., 'per_learner', 'flat_rate', 'subscription'
            $table->decimal('base_price', 10, 2)->nullable(false)->default(0.00);

            // Optional: Link to a specific discount/offer
            $table->char('discount_offer_id', 36)->nullable()->index();

            $table->text('internal_notes')->nullable(); // OE's internal notes on this price
            $table->tinyInteger('is_active')->default(1);

            // Foreign key for audit trail
            $table->char('created_by_user_id', 36)->index();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade'); // If program deleted, its price records go
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade'); // If course deleted, its price records go
            $table->foreign('discount_offer_id')->references('id')->on('discounts_offers')->onDelete('set null'); // If discount deleted, price remains but loses discount link
            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_prices');
    }
};