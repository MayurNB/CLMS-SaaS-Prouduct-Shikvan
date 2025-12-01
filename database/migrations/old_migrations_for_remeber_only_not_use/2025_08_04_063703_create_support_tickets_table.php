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
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // The user who created the ticket
            $table->char('created_by_user_id', 36)->index();

            // The user (staff member) assigned to the ticket
            $table->char('assigned_to_user_id', 36)->nullable()->index();

            $table->string('subject', 255)->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('status', 50)->default('open'); // e.g., 'open', 'in_progress', 'closed'
            $table->integer('priority')->default(0); // e.g., 0=low, 1=medium, 2=high

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE CASCADE: If a user is deleted, their tickets are also deleted.
            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('cascade');

            // ON DELETE SET NULL: If an assigned staff member is deleted, the ticket remains unassigned.
            $table->foreign('assigned_to_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};