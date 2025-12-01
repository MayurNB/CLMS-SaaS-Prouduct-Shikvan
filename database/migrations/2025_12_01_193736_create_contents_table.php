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
        Schema::create('contents', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('course_id', 36)->index();
            $table->string('title')->default('');
            $table->string('content_type', 50)->default('document');
            $table->string('content_url', 2048)->default('');
            $table->text('description')->nullable();
            $table->integer('sort_order')->nullable();
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
        Schema::dropIfExists('contents');
    }
};
