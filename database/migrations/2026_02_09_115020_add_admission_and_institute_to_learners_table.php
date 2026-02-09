<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('learners', function (Blueprint $blueprint) {
            // 1. Add the Institute ID (To keep data separate for each client)
            $blueprint->char('institute_id', 36)->nullable()->after('id');
            
            // 2. Add the Admission ID (The link to the original form)
            $blueprint->char('admission_id', 36)->nullable()->after('user_id');

            // Optional: Add Foreign Key Constraints if your tables use InnoDB
            // $blueprint->foreign('institute_id')->references('id')->on('institutes');
            // $blueprint->foreign('admission_id')->references('id')->on('admission');
        });
    }

    public function down(): void
    {
        Schema::table('learners', function (Blueprint $blueprint) {
            $blueprint->dropColumn(['institute_id', 'admission_id']);
        });
    }
};