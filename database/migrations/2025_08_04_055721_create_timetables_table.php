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
        Schema::create('timetables', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // Link to the specific branch this timetable is for
            $table->char('branch_id', 36)->index();

            // Link to the course or program
            $table->char('course_id', 36)->nullable()->index();
            $table->char('program_id', 36)->nullable()->index();

            $table->string('title', 255)->nullable(false);
            $table->string('day_of_week', 20)->nullable(false); // e.g., 'Monday', 'Tuesday'
            $table->time('start_time')->nullable(false);
            $table->time('end_time')->nullable(false);
            $table->string('room_number', 50)->nullable();
            $table->char('instructor_user_id', 36)->nullable()->index(); // Instructor for this specific class

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE CASCADE: If a branch is deleted, its timetables are deleted.
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            
            // ON DELETE CASCADE: If a course or program is deleted, its timetable entries are deleted.
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');

            // ON DELETE SET NULL: If an instructor leaves, the timetable entry remains.
            $table->foreign('instructor_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};