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
        Schema::create('assignments', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // The course this assignment belongs to
            $table->char('course_id', 36)->index();

            // The user (instructor) who created this assignment
$table->char('created_by_user_id', 36)->nullable()->index();

            $table->string('title', 255)->nullable(false)->default('');
            $table->text('description')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->integer('max_points')->default(100);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE CASCADE: If a course is deleted, all its assignments are deleted.
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            // ON DELETE SET NULL: If a user (instructor) is deleted, the assignment remains but the created_by link is removed.
            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};