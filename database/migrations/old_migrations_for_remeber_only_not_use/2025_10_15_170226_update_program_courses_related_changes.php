<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 🔹 programs table
        Schema::table('programs', function (Blueprint $table) {
            if (Schema::hasColumn('programs', 'created_by_user_id')) {
                $table->renameColumn('created_by_user_id', 'institute_id');
            }
        });

        // 🔹 program_prices table
        Schema::table('program_prices', function (Blueprint $table) {
            // First, drop foreign key if exists
            if (Schema::hasColumn('program_prices', 'course_id')) {
                // Drop the foreign key safely (if it exists)
                try {
                    $table->dropForeign(['course_id']);
                } catch (\Exception $e) {
                    // ignore if already removed
                }

                // Now drop the column
                $table->dropColumn('course_id');
            }

            if (Schema::hasColumn('program_prices', 'created_by_user_id')) {
                $table->renameColumn('created_by_user_id', 'institute_id');
            }
        });

        // 🔹 tags table
        Schema::table('tags', function (Blueprint $table) {
            if (Schema::hasColumn('tags', 'created_by_user_id')) {
                $table->renameColumn('created_by_user_id', 'institute_id');
            }
        });

        // 🔹 discounts_offers table
        Schema::table('discounts_offers', function (Blueprint $table) {
            if (Schema::hasColumn('discounts_offers', 'created_by_user_id')) {
                $table->renameColumn('created_by_user_id', 'institute_id');
            }
        });

        // 🔹 courses table
        Schema::table('courses', function (Blueprint $table) {
            if (Schema::hasColumn('courses', 'created_by_user_id')) {
                $table->renameColumn('created_by_user_id', 'institute_id');
            }
        });
    }

    public function down(): void
    {
        // Rollback
        Schema::table('programs', function (Blueprint $table) {
            if (Schema::hasColumn('programs', 'institute_id')) {
                $table->renameColumn('institute_id', 'created_by_user_id');
            }
        });

        Schema::table('program_prices', function (Blueprint $table) {
            if (!Schema::hasColumn('program_prices', 'course_id')) {
                $table->char('course_id', 36)->nullable()->after('program_id');

                // Restore foreign key
                $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            }

            if (Schema::hasColumn('program_prices', 'institute_id')) {
                $table->renameColumn('institute_id', 'created_by_user_id');
            }
        });

        Schema::table('tags', function (Blueprint $table) {
            if (Schema::hasColumn('tags', 'institute_id')) {
                $table->renameColumn('institute_id', 'created_by_user_id');
            }
        });

        Schema::table('discounts_offers', function (Blueprint $table) {
            if (Schema::hasColumn('discounts_offers', 'institute_id')) {
                $table->renameColumn('institute_id', 'created_by_user_id');
            }
        });

        Schema::table('courses', function (Blueprint $table) {
            if (Schema::hasColumn('courses', 'institute_id')) {
                $table->renameColumn('institute_id', 'created_by_user_id');
            }
        });
    }
};
