<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('learner_catalog', function (Blueprint $table) {
            // Change created_by to CHAR(36)
           // $table->char('created_by', 36)->change();

            // Add new user_id column
            $table->char('user_id', 36)->nullable()->after('program_id');

            // Optional: add foreign key to users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
           // $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('learner_catalog', function (Blueprint $table) {
            // Drop foreign keys
            $table->dropForeign(['user_id']);
            $table->dropForeign(['created_by']);

            // Drop user_id column
            $table->dropColumn('user_id');

            // Change created_by back to BIGINT
            $table->bigInteger('created_by')->unsigned()->change();
        });
    }
};
