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
            Schema::table('learner_catalog', function (Blueprint $table) {
        // This drops the UNIQUE index on the raw_phone column.
        $table->dropUnique(['raw_phone']);
    });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('learner_catalog', function (Blueprint $table) {
            //
        });
    }
};
