<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('timetables', function (Blueprint $table) {

            // 1️⃣ Add missing hierarchy fields
            $table->uuid('institute_id')->after('id');
            $table->uuid('batch_id')->after('program_id');

            // 2️⃣ Rename columns (semantic clarity)
            $table->renameColumn('day_of_week', 'day');
            $table->renameColumn('room_number', 'classroom');
            $table->renameColumn('instructor_user_id', 'instructor_id');

            // 3️⃣ Add slot logic
            $table->unsignedSmallInteger('sequence_no')->after('day');

            // 4️⃣ Status & audit
            $table->string('status', 20)->default('active')->after('classroom');
            $table->uuid('created_by')->nullable()->after('status');

            // 5️⃣ Indexes
            $table->index(['branch_id', 'batch_id', 'day']);
            $table->index('instructor_id');

            // 6️⃣ Slot uniqueness
            $table->unique(
                ['branch_id', 'batch_id', 'day', 'sequence_no'],
                'unique_batch_day_slot'
            );
        });
    }

    public function down(): void
    {
        Schema::table('timetables', function (Blueprint $table) {

            $table->dropUnique('unique_batch_day_slot');
            $table->dropIndex(['branch_id', 'batch_id', 'day']);
            $table->dropIndex(['instructor_id']);

            $table->dropColumn([
                'institute_id',
                'batch_id',
                'sequence_no',
                'status',
                'created_by'
            ]);

            $table->renameColumn('day', 'day_of_week');
            $table->renameColumn('classroom', 'room_number');
            $table->renameColumn('instructor_id', 'instructor_user_id');
        });
    }
};
