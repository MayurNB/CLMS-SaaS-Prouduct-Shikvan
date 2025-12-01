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
        Schema::table('program_prices', function (Blueprint $table) {
            $table->foreign(['discount_offer_id'])->references(['id'])->on('discounts_offers')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['program_id'])->references(['id'])->on('programs')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('program_prices', function (Blueprint $table) {
            $table->dropForeign('program_prices_discount_offer_id_foreign');
            $table->dropForeign('program_prices_program_id_foreign');
        });
    }
};
