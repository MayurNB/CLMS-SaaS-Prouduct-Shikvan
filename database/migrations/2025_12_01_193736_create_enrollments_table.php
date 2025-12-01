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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('learner_id', 36)->index()->comment('FK to learners table');
            $table->char('program_id', 36)->index()->comment('FK to programs table');
            $table->char('branch_id', 36)->index()->comment('CRITICAL: FK for scoping');
            $table->date('enrollment_date')->nullable();
            $table->string('status', 50)->default('active');
            $table->timestamps();

            $table->unique(['learner_id', 'program_id', 'branch_id'], 'unique_enrollment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
