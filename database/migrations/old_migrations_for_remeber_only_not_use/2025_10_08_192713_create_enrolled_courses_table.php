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
       Schema::create('enrolled_courses', function (Blueprint $table) {
    $table->char('id', 36)->primary();
    $table->char('enrollment_id', 36)->index()->comment('FK to the enrollments record');
    $table->char('course_id', 36)->index()->comment('FK to the courses master catalog');

    // Prevents adding the same course twice to the same enrollment
    $table->unique(['enrollment_id', 'course_id']); 

    $table->string('status', 50)->default('in_progress'); 
    
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolled_courses');
    }
};
