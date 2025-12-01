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
            $table->char('id', 36)->primary();
            $table->char('user_id', 36);
            $table->char('branch_id', 36)->index('user_branch_roles_branch_id_foreign');
            $table->char('role_id', 36)->index('user_branch_roles_role_id_foreign');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

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
