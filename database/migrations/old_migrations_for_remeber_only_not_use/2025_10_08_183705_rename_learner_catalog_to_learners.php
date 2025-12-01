<?php
// File: 2025_10_08_183705_rename_learner_catalog_to_learners.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. RENAME THE TABLE
        Schema::rename('learners_data', 'learners');

        // 2. MODIFY THE NEWLY RENAMED 'learners' TABLE
        Schema::table('learners', function (Blueprint $table) {
            
            // DROP columns that are now moving to the enrollments and enrollment_fees tables
            // These names are pulled EXACTLY from your DESCRIBE output.
            $table->dropColumn([
                'raw_program_name', // Moving to the 'enrollments' table context
                'raw_fee_amount',   // Moving to 'enrollment_fees' table
                'paid_amount',      // Moving to 'enrollment_fees' table
            ]); 
            
            // RETAIN 'raw_learner_name', 'raw_email', 'raw_phone' for identity stability.

            // ADD the essential, future-proof columns
            // Learner Code (The unique business identifier)
            $table->string('learner_code', 20)->unique()->nullable()->after('user_id'); 
            
            // Fix existing columns to be nullable if needed (user_id and learner_id are often nullable at first)
            $table->char('user_id', 36)->nullable()->change();
            $table->char('learner_id', 36)->nullable()->change();
            $table->char('program_id', 36)->nullable()->change(); // This will be deprecated soon, but keep it for now
        });
    }

    public function down(): void
    {
        // This rollback is less critical, but should reverse the changes
        Schema::table('learners', function (Blueprint $table) {
            // Re-add dropped columns for the rollback scenario (optional, but good practice)
            $table->decimal('raw_fee_amount', 10, 2)->default(0.00)->after('status');
            $table->decimal('paid_amount', 10, 2)->default(0.00)->after('raw_fee_amount');
            $table->string('raw_program_name', 255)->after('raw_phone');

            $table->dropUnique(['learner_code']);
            $table->dropColumn('learner_code');
        });
        Schema::rename('learners', 'learner_catalog');
    }
};