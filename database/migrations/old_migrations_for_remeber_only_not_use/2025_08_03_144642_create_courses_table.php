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
        Schema::create('courses', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            $table->string('course_name', 255)->nullable(false)->default('');
            $table->text('description')->nullable();
            $table->string('thumbnail_url', 2048)->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->tinyInteger('is_published')->default(0);

            // Foreign key to link a course to an optional program
            $table->char('program_id', 36)->nullable()->index();

            // Foreign key to link an instructor (a user) to this course
            $table->char('instructor_user_id', 36)->nullable()->index();

            // Foreign key for audit trail
            $table->char('created_by_user_id', 36)->index();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE SET NULL: If a program is deleted, the course remains, but its program_id is nulled.
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('set null');
            // ON DELETE SET NULL: If an instructor leaves, the course remains but loses its instructor association.
            $table->foreign('instructor_user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};