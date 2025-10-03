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
        Schema::create('exam_papers', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // The exam this question belongs to
            $table->char('exam_id', 36)->index();

            $table->text('question_text')->nullable(false);
            $table->string('question_type', 50)->default('text'); // e.g., 'multiple_choice', 'true_false', 'short_answer'
            $table->integer('points')->nullable(false)->default(1);
            $table->text('options')->nullable(); // JSON data for multiple choice options
            $table->text('correct_answer')->nullable(); // The correct answer

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraint
            // ON DELETE CASCADE: If an exam is deleted, all its questions are also deleted.
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_papers');
    }
};