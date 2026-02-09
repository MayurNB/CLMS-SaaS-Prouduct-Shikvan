<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('learner_batch', function (Blueprint $table) {

            // Primary Key
            $table->uuid('id')->primary();

            // Core hierarchy
            $table->uuid('institute_id');
            $table->uuid('branch_id');
            $table->uuid('program_id');
            $table->uuid('batch_id');
            $table->uuid('learner_id');

            // Status
            $table->string('status', 20)->default('active');
            // active | inactive | completed | transferred | dropped

            // Audit
            $table->uuid('created_by')->nullable();

            $table->timestamps();

            /**
             * UNIQUE RULE
             * Same learner cannot be added
             * twice in same batch under same institute
             */
            $table->unique(
                ['institute_id', 'batch_id', 'learner_id'],
                'unique_learner_batch_assignment'
            );

            // Indexes for performance
            $table->index('learner_id');
            $table->index('batch_id');
            $table->index('program_id');
            $table->index('branch_id');
            $table->index('institute_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learner_batch');
    }
};
