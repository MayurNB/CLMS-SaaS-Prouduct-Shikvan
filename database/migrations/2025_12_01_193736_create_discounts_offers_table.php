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
        Schema::create('discounts_offers', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('name')->default('');
            $table->text('description_public')->nullable();
            $table->text('description_internal')->nullable();
            $table->string('type', 50);
            $table->decimal('value', 10)->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->char('program_id', 36)->nullable()->index();
            $table->char('course_id', 36)->nullable()->index();
            $table->char('institute_id', 36)->index('discounts_offers_created_by_user_id_index');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
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
