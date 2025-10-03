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
        Schema::create('product_version_histories', function (Blueprint $table) {
            // Primary key using CHAR(36) for UUID consistency
            $table->char('id', 36)->primary();

            $table->string('version_number', 255)->nullable(false)->default('');
            // FIX: Removed default(DB::raw('CURRENT_DATE()')) due to MySQL version incompatibility
            // This column will now be nullable, or you must ensure your application provides a value.
            $table->date('release_date')->nullable(); // Made nullable

            // Foreign key to users table (for the user who released this version)
            $table->char('released_by_id', 36)->index(); // Index for FK performance
            $table->text('release_notes')->nullable(); // Can be null if no notes

            $table->tinyInteger('is_major_release')->default(0);

            // Timestamps with NOT NULL and proper defaults
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraint
            // ON DELETE RESTRICT: Don't delete history if the user who released it still exists.
            $table->foreign('released_by_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_version_histories');
    }
};