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
        Schema::create('reminders', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('reminder_type', 100)->index('idx_reminder_type');
            $table->string('reminder_title');
            $table->text('reminder_description')->nullable();
            $table->dateTime('reminder_start_date');
            $table->dateTime('reminder_end_date')->nullable();
            $table->char('reminder_from_user_id', 36)->nullable()->index('idx_reminder_from_user');
            $table->char('reminder_to_user_id', 36)->nullable()->index('idx_reminder_to_user');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
