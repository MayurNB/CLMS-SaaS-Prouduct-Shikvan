<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint; // Corrected this line
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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

    $table->string('name', 100)->nullable(false);
    $table->string('display_name', 255)->nullable(false); // Keep this as nullable(false)
    $table->text('description')->nullable();
    $table->tinyInteger('is_default')->default(0);
    $table->integer('level')->nullable();
    $table->text('dashboard_route_name')->nullable();
    $table->string('status', 50)->default('Active');

    // CHANGE THIS LINE: Make it nullable
    $table->char('created_by_user_id', 36)->nullable()->index();

    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
    $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

    $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('restrict');
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