<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ==============================
        // tax_masters
        // ==============================
        Schema::table('tax_masters', function (Blueprint $table) {
            $table->char('institute_id', 36)
                  ->after('id')
                  ->index();

            $table->foreign('institute_id')
                  ->references('id')
                  ->on('institute_infos')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });

        // ==============================
        // enrollment_taxes
        // ==============================
        Schema::table('enrollment_taxes', function (Blueprint $table) {
            $table->char('institute_id', 36)
                  ->after('id')
                  ->index();

            $table->foreign('institute_id')
                  ->references('id')
                  ->on('institute_infos')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        // ==============================
        // tax_masters
        // ==============================
        Schema::table('tax_masters', function (Blueprint $table) {
            $table->dropForeign(['institute_id']);
            $table->dropIndex(['institute_id']);
            $table->dropColumn('institute_id');
        });

        // ==============================
        // enrollment_taxes
        // ==============================
        Schema::table('enrollment_taxes', function (Blueprint $table) {
            $table->dropForeign(['institute_id']);
            $table->dropIndex(['institute_id']);
            $table->dropColumn('institute_id');
        });
    }
};
