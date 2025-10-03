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
        // In the up() method
Schema::table('learner_catalog', function (Blueprint $table) {
    // This removes the unique index on the column
    $table->dropUnique(['raw_phone']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // In the down() method
Schema::table('learner_catalog', function (Blueprint $table) {
    // Optional: add it back for rollback purposes
    // $table->unique('raw_phone');
});
    }
};