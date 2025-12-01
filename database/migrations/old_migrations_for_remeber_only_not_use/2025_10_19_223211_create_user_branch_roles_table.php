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
        Schema::create('user_branch_roles', function (Blueprint $table) {
            // 1. Primary Key and IDs
            $table->uuid('id')->primary(); // Use UUID for the primary key
            $table->uuid('user_id'); // Foreign key to the 'users' table
            $table->uuid('branch_id'); // Foreign key to the 'branches' table
            $table->uuid('role_id'); // Foreign key to the 'roles' table

            // 2. Control Fields
            $table->tinyInteger('is_active')->default(1); // To activate/deactivate the assignment
            $table->timestamps();

            // 3. Foreign Key Constraints (Ensure data integrity)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');

            // 4. Unique Constraint (Crucial for preventing duplicates)
            // A single user should only have one instance of a specific role at a specific branch.
            $table->unique(['user_id', 'branch_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_branch_roles');
    }
};