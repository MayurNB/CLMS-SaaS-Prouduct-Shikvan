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
        Schema::table('employers_profiles', function (Blueprint $table) {
            $table->foreign(['onboarded_by_user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employers_profiles', function (Blueprint $table) {
            $table->dropForeign('employers_profiles_onboarded_by_user_id_foreign');
            $table->dropForeign('employers_profiles_user_id_foreign');
        });
    }
};
