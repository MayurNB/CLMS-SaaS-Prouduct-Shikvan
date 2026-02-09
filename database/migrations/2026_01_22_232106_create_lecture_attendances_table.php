<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('lecture_attendances', function (Blueprint $table) {

            $table->uuid('id')->primary();

            // Lecture identity
            $table->date('attendance_date');
            $table->uuid('timetable_id')->index();

            // Scope
            $table->uuid('institute_id')->index();
            $table->uuid('branch_id')->index();
            $table->uuid('program_id')->index();
            $table->uuid('batch_id')->index();
            $table->uuid('course_id')->index();

            // Who taught
            $table->uuid('instructor_id')->index();

            // Actual lecture details
            $table->string('classroom')->nullable();
            $table->time('actual_start_time')->nullable();
            $table->time('actual_end_time')->nullable();

            // Guest handling
            $table->boolean('is_guest_lecture')->default(false);
            $table->string('guest_name')->nullable();

            // Notes
            $table->text('remark')->nullable();

            $table->uuid('created_by')->nullable();
            $table->timestamps();

            // Prevent duplicate lecture entry
            $table->unique(
                ['timetable_id', 'attendance_date'],
                'uniq_lecture_per_day'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lecture_attendances');
    }
};
