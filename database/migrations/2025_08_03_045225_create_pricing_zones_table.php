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
        Schema::create('pricing_zones', function (Blueprint $table) {
            // Primary key using CHAR(36) for UUID consistency
            $table->char('zone_id', 36)->primary();

            $table->string('zone_name', 100)->unique()->nullable(false)->default('');
            $table->text('description')->nullable(); // Made nullable
            $table->decimal('rate_multiplier', 5, 2)->nullable(false)->default(1.00); // Default 1.00
            $table->tinyInteger('is_active')->default(1);

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
        Schema::dropIfExists('pricing_zones');
    }
};