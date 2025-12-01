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
        Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('assignment_id', 36)->index();
            $table->char('submitted_by_user_id', 36)->index();
            $table->text('submission_text')->nullable();
            $table->string('file_url', 2048)->nullable();
            $table->timestamp('submission_date')->useCurrent();
            $table->integer('points_awarded')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
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
