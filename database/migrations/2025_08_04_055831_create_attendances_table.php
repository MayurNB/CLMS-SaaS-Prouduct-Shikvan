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
        Schema::create('attendances', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // The specific class from the timetable this attendance record is for
            $table->char('timetable_id', 36)->index();

            // The learner (user) for this attendance record
            $table->char('user_id', 36)->index();

            $table->enum('status', ['present', 'absent', 'late', 'excused'])->default('absent');
            $table->date('attendance_date')->nullable(false);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Composite unique constraint to prevent duplicate attendance records for the same user and class
            $table->unique(['timetable_id', 'user_id', 'attendance_date']);

            // Foreign key constraints
            // ON DELETE CASCADE: If a timetable entry is deleted, all its attendance records are deleted.
            $table->foreign('timetable_id')->references('id')->on('timetables')->onDelete('cascade');

            // ON DELETE CASCADE: If a user is deleted, all their attendance records are deleted.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};