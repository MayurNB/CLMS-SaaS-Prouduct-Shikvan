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
        Schema::create('assignments', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('course_id', 36)->index();
            $table->char('created_by_user_id', 36)->nullable()->index();
            $table->string('title')->default('');
            $table->text('description')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->integer('max_points')->default(100);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
