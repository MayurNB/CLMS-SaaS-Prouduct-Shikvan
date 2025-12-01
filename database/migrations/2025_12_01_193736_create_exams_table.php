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
        Schema::create('exams', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('course_id', 36)->index();
            $table->char('created_by_user_id', 36)->nullable()->index();
            $table->string('title')->default('');
            $table->text('instructions')->nullable();
            $table->integer('duration_minutes')->nullable();
            $table->timestamp('available_at')->nullable();
            $table->timestamp('due_at')->nullable();
            $table->tinyInteger('is_published')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
