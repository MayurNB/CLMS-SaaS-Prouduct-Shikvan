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
        Schema::create('packages', function (Blueprint $table) {
            // Primary key using CHAR(36) for UUID consistency
            $table->char('package_id', 36)->primary();

            $table->string('package_name', 100)->unique()->nullable(false)->default('');
            $table->text('description')->nullable(); // Made nullable

            // Capacity and limit fields with NOT NULL and default 0
            $table->integer('min_learner_capacity')->nullable(false)->default(0);
            $table->integer('max_learner_capacity')->nullable(false)->default(0);
            $table->decimal('base_per_learner_rate_urban', 10, 2)->nullable(false)->default(0.00);
            $table->integer('instructor_capacity_limit')->nullable(false)->default(0);
            $table->integer('storage_limit_mb')->nullable(false)->default(0);

            $table->json('features')->nullable(); // Flexible JSON field for features
            $table->tinyInteger('is_active')->default(1);
            $table->integer('sort_order')->nullable(); // Can be null if no specific order

            // Timestamps with NOT NULL and proper defaults
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};