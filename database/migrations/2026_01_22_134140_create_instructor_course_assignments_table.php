<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instructor_course_assignments', function (Blueprint $table) {

            // Primary Key
            $table->uuid('id')->primary();

            // Scope / Ownership
            $table->uuid('institute_id');
            $table->uuid('branch_id')->nullable(); // NULL = applies to all branches
            $table->uuid('program_id');
            $table->uuid('course_id');
            $table->uuid('user_id'); // Instructor (user table)

            // Status
            $table->string('status', 20)->default('active');
            // active | inactive | suspended

            // Audit
            $table->uuid('created_by')->nullable();
            $table->timestamps();

            /**
             * UNIQUE CONSTRAINT
             * Same instructor cannot be assigned
             * same course in same program, branch, institute
             */
            $table->unique(
                [
                    'institute_id',
                    'branch_id',
                    'program_id',
                    'course_id',
                    'user_id'
                ],
                'uniq_inst_branch_prog_course_instructor'
            );

            // Indexes (performance-friendly, no FK lock-in)
            $table->index('institute_id');
            $table->index('branch_id');
            $table->index('program_id');
            $table->index('course_id');
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instructor_course_assignments');
    }
};
