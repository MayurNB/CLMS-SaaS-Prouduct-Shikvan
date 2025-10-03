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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // The user who performed the action
            $table->char('user_id', 36)->nullable()->index();

            $table->string('activity_type', 100)->nullable(false); // e.g., 'user_login', 'course_created', 'payment_processed'
            $table->text('description')->nullable();
            
            // Polymorphic relation to the model that was affected by the action
            $table->char('loggable_id', 36)->nullable();
            $table->string('loggable_type', 255)->nullable();
            $table->index(['loggable_id', 'loggable_type']);

            $table->json('changes')->nullable(); // Stores before and after values for updates

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraint
            // ON DELETE SET NULL: If a user is deleted, their activity history remains for auditing.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};