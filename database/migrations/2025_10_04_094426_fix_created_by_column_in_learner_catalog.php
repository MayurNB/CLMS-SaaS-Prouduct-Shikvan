<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('learner_catalog', function (Blueprint $table) {
            // Drop old wrong column + foreign key
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });

        Schema::table('learner_catalog', function (Blueprint $table) {
            // Correct column type for UUID user id
            $table->char('created_by', 36)->after('program_id');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('learner_catalog', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');

            // restore bigint if you rollback
            $table->unsignedBigInteger('created_by')->after('program_id');
        });
    }
};
