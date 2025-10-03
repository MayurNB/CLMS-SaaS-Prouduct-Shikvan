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
        Schema::create('payments', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            $table->decimal('amount', 10, 2)->nullable(false);
            $table->string('payment_method', 50)->nullable();
            $table->string('transaction_id', 255)->unique()->nullable();
            $table->string('status', 50)->default('pending'); // e.g., 'pending', 'completed', 'failed'
            $table->timestamp('paid_at')->nullable();
            
            // Polymorphic relation to link the payment to its source (e.g., a subscription, a one-off course purchase)
            $table->char('payable_id', 36)->nullable();
            $table->string('payable_type', 255)->nullable();
            $table->index(['payable_id', 'payable_type']);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};