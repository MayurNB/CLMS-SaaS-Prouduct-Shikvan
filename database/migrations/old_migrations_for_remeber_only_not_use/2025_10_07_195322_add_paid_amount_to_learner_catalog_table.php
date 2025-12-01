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
        Schema::table('learner_catalog', function (Blueprint $table) {
            // This single column, combined with 'raw_fee_amount', enables the entire Fee Tracking MVP.
            // Remaining Fee will be calculated as (raw_fee_amount - paid_amount).
            $table->decimal('paid_amount', 10, 2)
                  ->default(0.00)
                  ->after('raw_fee_amount') 
                  ->comment('The cumulative total amount of fees paid by the learner.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('learner_catalog', function (Blueprint $table) {
            $table->dropColumn('paid_amount');
        });
    }
};
