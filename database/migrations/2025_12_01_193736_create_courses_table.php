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
        Schema::create('courses', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('course_name')->default('');
            $table->string('normalized_name')->nullable();
            $table->text('description')->nullable();
            $table->string('thumbnail_url', 2048)->nullable();
            $table->decimal('price', 10)->default(0);
            $table->tinyInteger('is_published')->default(0);
            $table->char('program_id', 36)->nullable()->index();
            $table->char('instructor_user_id', 36)->nullable()->index();
            $table->char('institute_id', 36)->index('courses_created_by_user_id_index');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
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
