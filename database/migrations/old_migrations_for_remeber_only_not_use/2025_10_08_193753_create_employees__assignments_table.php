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
        Schema::create('employees__assignments', function (Blueprint $table) {
    $table->char('id', 36)->primary();
    $table->char('user_id', 36)->unique()->comment('FK to users table - one user can only have one staff profile per institute.');
    $table->char('institute_id', 36)->index()->comment('FK to institute_infos');
    $table->char('branch_id', 36)->index()->nullable()->comment('FK to branches - defines their primary work location/scope.');
    
    $table->string('job_title', 100)->nullable(); // e.g., 'Branch Manager', 'Instructor', 'Admin'
    $table->string('status', 50)->default('active'); // active, on_leave, terminated
    
    // Ensures one user is only assigned once to an institute (prevents confusion)
    $table->unique(['user_id', 'institute_id']); 

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees__assignments');
    }
};
