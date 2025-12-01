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
        Schema::table('employer_consents', function (Blueprint $table) {
            $table->foreign(['employer_id'])->references(['id'])->on('employers_profiles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employer_consents', function (Blueprint $table) {
            $table->dropForeign('employer_consents_employer_id_foreign');
        });
    }
};
