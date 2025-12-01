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
        Schema::create('packages', function (Blueprint $table) {
            $table->char('package_id', 36)->primary();
            $table->string('package_name', 100)->default('')->unique();
            $table->text('description')->nullable();
            $table->integer('min_learner_capacity')->default(0);
            $table->integer('max_learner_capacity')->default(0);
            $table->decimal('base_per_learner_rate_urban', 10)->default(0);
            $table->integer('instructor_capacity_limit')->default(0);
            $table->integer('storage_limit_mb')->default(0);
            $table->json('features')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->integer('sort_order')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
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
