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
        Schema::create('communications', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // The sender of the communication (e.g., an admin or system)
            $table->char('from_user_id', 36)->nullable()->index();

            // The receiver of the communication
            $table->char('to_user_id', 36)->index();

            $table->string('subject', 255)->nullable();
            $table->text('message');
            $table->string('type', 50)->default('email'); // e.g., 'email', 'sms', 'notification'
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('read_at')->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE SET NULL: If a sender is deleted, the communication history remains.
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('set null');

            // ON DELETE CASCADE: If a recipient is deleted, their communication history is deleted.
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communications');
    }
};