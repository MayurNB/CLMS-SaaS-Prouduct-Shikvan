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
        Schema::create('employer_payments', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // The employer who made the payment
            $table->char('employer_profile_id', 36)->index();

            // Optional link to a subscription (e.g., for a renewal payment)
            $table->char('subscription_id', 36)->nullable()->index();
            
            // The payment transaction itself
            $table->char('payment_id', 36)->index();

            // The user who performed this action on behalf of the employer
            $table->char('processed_by_user_id', 36)->nullable()->index();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE CASCADE: If an employer profile is deleted, all their payments are deleted.
            $table->foreign('employer_profile_id')->references('id')->on('employers_profiles')->onDelete('cascade');
            
            // ON DELETE SET NULL: If a subscription is deleted, the payment record remains.
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('set null');

            // ON DELETE RESTRICT: Don't delete a payment record if it is linked here.
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('restrict');

            // ON DELETE SET NULL: If the user who processed the payment is deleted, the link is removed.
            $table->foreign('processed_by_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_payments');
    }
};