<?php
// File: clean_up_redundant_columns_in_learners_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('learners', function (Blueprint $table) {
            // These columns are now correctly stored in the 'enrollments' table.
            $table->dropColumn('program_id');
            
            // Assuming the unique learner identifier is now 'learner_code'.
            // The 'learner_id' column is redundant with the PK 'id' or the unique 'learner_code'.
            $table->dropColumn('learner_id'); 
        });
    }

    public function down(): void
    {
        // For safe rollback, add them back (use char(36) as before)
        Schema::table('learners', function (Blueprint $table) {
            $table->char('learner_id', 36)->nullable()->after('status');
            $table->char('program_id', 36)->nullable()->after('learner_id');
        });
    }
};