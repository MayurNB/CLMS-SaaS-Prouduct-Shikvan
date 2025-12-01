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
        Schema::table('assignment_submissions', function (Blueprint $table) {
            $table->foreign(['assignment_id'])->references(['id'])->on('assignments')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['submitted_by_user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assignment_submissions', function (Blueprint $table) {
            $table->dropForeign('assignment_submissions_assignment_id_foreign');
            $table->dropForeign('assignment_submissions_submitted_by_user_id_foreign');
        });
    }
};
