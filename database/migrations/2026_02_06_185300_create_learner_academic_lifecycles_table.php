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
        Schema::create('learner_academic_lifecycles', function (Blueprint $table) {
            $table->uuid('id')->primary();
    $table->uuid('learner_id')->index();
    $table->uuid('academic_context_id');
    $table->uuid('enrollment_id')->nullable();
    $table->string('event_type'); // admission, promotion, completion
    $table->json('performance_snapshot')->nullable();
    $table->json('financial_summary')->nullable();
    $table->json('meta_data')->nullable(); // Audit and extra history
    $table->uuid('created_by');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learner_academic_lifecycles');
    }
};
