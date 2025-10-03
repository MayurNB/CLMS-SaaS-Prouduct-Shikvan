<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This adds the 'normalized_name' column for case/space-insensitive uniqueness checks.
     */
    public function up(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            // Add the column. We make it nullable so existing dummy data doesn't fail.
            $table->string('normalized_name')->nullable()->after('program_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('normalized_name');
        });
    }
};
