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
        Schema::table('product_infos', function (Blueprint $table) {
            $table->foreign(['current_version'])->references(['id'])->on('product_version_histories')->onUpdate('no action')->onDelete('restrict');
            $table->foreign(['last_updated_by_user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_infos', function (Blueprint $table) {
            $table->dropForeign('product_infos_current_version_foreign');
            $table->dropForeign('product_infos_last_updated_by_user_id_foreign');
        });
    }
};
