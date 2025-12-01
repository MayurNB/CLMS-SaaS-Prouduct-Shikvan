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
        Schema::create('program_prices', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('program_id', 36)->nullable()->index();
            $table->string('price_type', 50);
            $table->decimal('base_price', 10)->default(0);
            $table->char('discount_offer_id', 36)->nullable()->index();
            $table->text('internal_notes')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->char('institute_id', 36)->index('program_prices_created_by_user_id_index');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_prices');
    }
};
