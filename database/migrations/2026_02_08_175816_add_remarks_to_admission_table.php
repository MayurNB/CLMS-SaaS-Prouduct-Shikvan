<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('admission', function (Blueprint $table) {
            // Adding remarks after the status column
            $table->text('remarks')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('admission', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });
    }
};