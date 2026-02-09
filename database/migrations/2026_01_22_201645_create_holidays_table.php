<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('holidays', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->uuid('institute_id');
            $table->uuid('branch_id')->nullable(); // NULL = global institute holiday

            $table->date('holiday_date');

            $table->enum('holiday_type', ['FULL', 'HALF'])
                  ->default('FULL');

            $table->string('reason')->nullable();

            $table->string('status', 20)->default('active');
            // active | inactive

            $table->uuid('created_by')->nullable();

            $table->timestamps();

            /**
             * Unique:
             * One holiday per institute/branch per date
             */
            $table->unique(
                ['institute_id', 'branch_id', 'holiday_date'],
                'unique_institute_branch_holiday'
            );

            // Indexes for performance
            $table->index(['institute_id', 'holiday_date']);
            $table->index('branch_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('holidays');
    }
};
