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
        Schema::create('contents', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // Foreign key to link content to a specific course
            $table->char('course_id', 36)->index();

            $table->string('title', 255)->nullable(false)->default('');
            $table->string('content_type', 50)->default('document'); // e.g., 'video', 'pdf', 'quiz', 'link'
            $table->string('content_url', 2048)->nullable(false)->default('');
            $table->text('description')->nullable();
            $table->integer('sort_order')->nullable();
            $table->tinyInteger('is_published')->default(0);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE CASCADE: If a course is deleted, all its content is also deleted.
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};