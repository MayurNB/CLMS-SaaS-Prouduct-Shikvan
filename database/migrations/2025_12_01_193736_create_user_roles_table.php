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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->char('user_id', 36);
            $table->char('role_id', 36)->index('user_roles_role_id_foreign');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->char('assigned_by', 36)->nullable()->index('user_roles_assigned_by_foreign');
            $table->timestamp('activated_at')->nullable();
            $table->timestamps();

            $table->primary(['user_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
