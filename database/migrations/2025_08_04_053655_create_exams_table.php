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
        Schema::create('exams', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // The course this exam belongs to
            $table->char('course_id', 36)->index();

            // The user (instructor) who created this exam
            $table->char('created_by_user_id', 36)->nullable()->index();

            $table->string('title', 255)->nullable(false)->default('');
            $table->text('instructions')->nullable();
            $table->integer('duration_minutes')->nullable();
            $table->timestamp('available_at')->nullable(); // When the exam becomes available
            $table->timestamp('due_at')->nullable(); // When the exam is due
            $table->tinyInteger('is_published')->default(0);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE CASCADE: If a course is deleted, all its exams are deleted.
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            // ON DELETE SET NULL: If a user (instructor) is deleted, the exam remains but the created_by link is removed.
            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};