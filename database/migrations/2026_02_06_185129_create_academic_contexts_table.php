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
        Schema::create('academic_contexts', function (Blueprint $table) {
            $table->uuid('id')->primary();
    $table->uuid('institute_id');
    $table->string('label'); // e.g., "FY B.Tech - Sem 1"
    $table->string('academic_year'); // e.g., "2026-27"
    $table->string('stream')->nullable();
    $table->string('level')->nullable(); // Nursery, UG, PhD
    $table->string('current_year')->nullable();
    $table->string('current_term')->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_contexts');
    }
};
