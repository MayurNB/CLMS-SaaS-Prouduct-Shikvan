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
        Schema::create('results', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // The user (learner) who took the exam
            $table->char('user_id', 36)->index();

            // The exam the result is for
            $table->char('exam_id', 36)->index();

            $table->integer('total_points')->nullable();
            $table->integer('points_awarded')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->string('status', 50)->default('pending'); // e.g., 'pending', 'passed', 'failed'

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE CASCADE: If a user is deleted, all their results are deleted.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // ON DELETE CASCADE: If an exam is deleted, all its results are deleted.
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};