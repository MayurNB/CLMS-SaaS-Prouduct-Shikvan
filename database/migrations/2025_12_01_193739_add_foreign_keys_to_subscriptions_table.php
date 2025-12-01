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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->foreign(['employer_profile_id'])->references(['id'])->on('employers_profiles')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['initiated_by_user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['package_id'])->references(['package_id'])->on('packages')->onUpdate('no action')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign('subscriptions_employer_profile_id_foreign');
            $table->dropForeign('subscriptions_initiated_by_user_id_foreign');
            $table->dropForeign('subscriptions_package_id_foreign');
        });
    }
};
