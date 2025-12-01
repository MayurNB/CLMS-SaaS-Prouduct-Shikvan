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
        Schema::create('permissions', function (Blueprint $table) {
            $table->char('permission_id', 36)->primary(); // Primary key for permissions

            $table->string('name', 100)->unique()->nullable(false); // Unique programmatic name
            $table->string('display_name', 255)->nullable(false); // Human-readable name
            $table->text('description')->nullable(); // Optional description
            $table->string('category', 100)->nullable(); // For grouping permissions (e.g., 'User Management', 'Course Content')
            $table->tinyInteger('is_super_admin_only')->default(0); // Flag for MASS-level permissions

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};