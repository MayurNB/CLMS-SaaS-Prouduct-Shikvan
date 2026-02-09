<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('batches', function (Blueprint $table) {

            // Primary Key
            $table->uuid('id')->primary();

            // Hierarchy
            $table->uuid('institute_id');
            $table->uuid('branch_id');
            $table->uuid('program_id');

            // Batch Identity
            $table->string('batch_code', 50);
            $table->string('batch_name', 150);
            $table->text('description')->nullable();

            // Capacity
            $table->unsignedInteger('max_size');
            $table->unsignedInteger('current_size')->default(0);

            // Academic Lifecycle
            $table->date('start_date');
            $table->date('end_date');
            $table->string('academic_year', 20); // e.g. 2025-2027

            // Control
            $table->enum('status', ['active', 'inactive', 'completed', 'cancelled'])
                  ->default('active');

            $table->enum('batch_type', ['regular', 'weekend', 'fast_track', 'online'])
                  ->default('regular');

            // Audit
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();

            $table->timestamps();

            // Indexes
            $table->index(['institute_id', 'branch_id', 'program_id']);

            // Unique Constraint (IMPORTANT)
            $table->unique(
                ['institute_id', 'branch_id', 'program_id', 'batch_code'],
                'unique_batch_per_program'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
