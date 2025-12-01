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
        Schema::create('role_permissions', function (Blueprint $table) {
            // Composite Primary Key for the many-to-many relationship
            $table->char('role_id', 36);
            $table->char('permission_id', 36);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->primary(['role_id', 'permission_id']); // Define composite primary key

            // Foreign key constraints
            // ON DELETE CASCADE: If a role is deleted, its permissions links are also deleted.
            // ON DELETE CASCADE: If a permission is deleted, its role links are also deleted.
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
            $table->foreign('permission_id')->references('permission_id')->on('permissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_permissions');
    }
};