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
        Schema::create('roles', function (Blueprint $table) {
            $table->char('role_id', 36)->primary();
            $table->char('employer_id', 36)->nullable()->index();
            $table->string('name', 100);
            $table->string('display_name');
            $table->text('description')->nullable();
            $table->tinyInteger('is_default')->default(0);
            $table->integer('level')->nullable();
            $table->text('dashboard_route_name')->nullable();
            $table->string('status', 50)->default('Active');
            $table->char('created_by_user_id', 36)->nullable()->index();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
