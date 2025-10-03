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
        Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // The assignment this submission belongs to
            $table->char('assignment_id', 36)->index();

            // The user (learner) who submitted the assignment
            $table->char('submitted_by_user_id', 36)->index();

            $table->text('submission_text')->nullable();
            $table->string('file_url', 2048)->nullable();
            $table->timestamp('submission_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('points_awarded')->nullable();
            $table->text('feedback')->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE CASCADE: If an assignment is deleted, all submissions for it are also deleted.
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');

            // ON DELETE CASCADE: If a user (learner) is deleted, their submissions are also deleted.
            $table->foreign('submitted_by_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_submissions');
    }
};