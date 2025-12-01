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
        Schema::create('employer_payments', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('employer_profile_id', 36)->index();
            $table->char('subscription_id', 36)->nullable()->index();
            $table->char('payment_id', 36)->index();
            $table->char('processed_by_user_id', 36)->nullable()->index();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
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
