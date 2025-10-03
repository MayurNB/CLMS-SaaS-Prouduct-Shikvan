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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->char('user_id', 36);
            $table->char('role_id', 36);

            // New columns for LMS control
            $table->enum('status', ['active', 'inactive'])->default('inactive'); // Role activation status
            $table->char('assigned_by', 36)->nullable(); // Who assigned this role
            $table->timestamp('activated_at')->nullable(); // When role was activated

                        $table->timestamps(); // automatically adds created_at & updated_at



            $table->primary(['user_id', 'role_id']);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('role_id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('assigned_by')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
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