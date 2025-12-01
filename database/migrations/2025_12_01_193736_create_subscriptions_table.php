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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('employer_profile_id', 36)->index();
            $table->char('package_id', 36)->index();
            $table->char('initiated_by_user_id', 36)->nullable()->index();
            $table->string('status', 50)->default('active');
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->decimal('price', 10);
            $table->string('payment_frequency', 50)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
