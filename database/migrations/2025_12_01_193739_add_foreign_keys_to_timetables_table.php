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
        Schema::table('timetables', function (Blueprint $table) {
            $table->foreign(['branch_id'])->references(['id'])->on('branches')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['course_id'])->references(['id'])->on('courses')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['instructor_user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['program_id'])->references(['id'])->on('programs')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timetables', function (Blueprint $table) {
            $table->dropForeign('timetables_branch_id_foreign');
            $table->dropForeign('timetables_course_id_foreign');
            $table->dropForeign('timetables_instructor_user_id_foreign');
            $table->dropForeign('timetables_program_id_foreign');
        });
    }
};
