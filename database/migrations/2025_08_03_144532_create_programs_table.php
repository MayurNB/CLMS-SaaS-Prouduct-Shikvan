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
        Schema::create('programs', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            $table->string('program_name', 255)->nullable(false)->default('');
            $table->text('description')->nullable();
            $table->integer('duration_days')->nullable(); // Optional duration
            $table->tinyInteger('is_active')->default(1);

            // Foreign key for audit trail
            $table->char('created_by_user_id', 36)->index();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE RESTRICT: Don't delete a user if they created programs
            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};