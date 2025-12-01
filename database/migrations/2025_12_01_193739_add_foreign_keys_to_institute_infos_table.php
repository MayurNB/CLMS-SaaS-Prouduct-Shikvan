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
        Schema::table('institute_infos', function (Blueprint $table) {
            $table->foreign(['employer_id'])->references(['id'])->on('employers_profiles')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('institute_infos', function (Blueprint $table) {
            $table->dropForeign('institute_infos_employer_id_foreign');
        });
    }
};
