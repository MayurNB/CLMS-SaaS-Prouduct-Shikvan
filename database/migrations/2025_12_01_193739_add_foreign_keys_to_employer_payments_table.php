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
        Schema::table('employer_payments', function (Blueprint $table) {
            $table->foreign(['employer_profile_id'])->references(['id'])->on('employers_profiles')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['payment_id'])->references(['id'])->on('payments')->onUpdate('no action')->onDelete('restrict');
            $table->foreign(['processed_by_user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['subscription_id'])->references(['id'])->on('subscriptions')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employer_payments', function (Blueprint $table) {
            $table->dropForeign('employer_payments_employer_profile_id_foreign');
            $table->dropForeign('employer_payments_payment_id_foreign');
            $table->dropForeign('employer_payments_processed_by_user_id_foreign');
            $table->dropForeign('employer_payments_subscription_id_foreign');
        });
    }
};
