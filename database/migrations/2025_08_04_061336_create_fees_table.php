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
        Schema::create('fees', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            $table->string('fee_name', 255)->nullable(false);
            $table->decimal('amount', 10, 2)->nullable(false);
            $table->string('type', 50)->default('one_time'); // e.g., 'one_time', 'recurring'

            // Optional link to a specific course or program
            $table->char('course_id', 36)->nullable()->index();
            $table->char('program_id', 36)->nullable()->index();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE CASCADE: If a course or program is deleted, the related fees are also deleted.
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};