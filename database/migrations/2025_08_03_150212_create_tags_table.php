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
        Schema::create('tags', function (Blueprint $table) {
            $table->char('id', 36)->primary(); // Primary key for tags

            $table->string('name', 100)->unique()->nullable(false); // The tag name (e.g., "AI", "Beginner", "Marketing")
            $table->string('type', 50)->nullable(); // Optional: e.g., 'program', 'course', 'general'
            $table->text('description')->nullable();

            // Audit fields: who created it and when
            $table->char('created_by_user_id', 36)->index();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key to users table
            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};