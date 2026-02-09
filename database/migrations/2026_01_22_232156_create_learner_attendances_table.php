<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('learner_attendances', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->uuid('lecture_attendance_id')->index();
            $table->uuid('learner_id')->index();

            $table->enum(
                'status',
                ['present', 'absent', 'late', 'excused']
            )->default('absent');

            $table->text('remark')->nullable();

            $table->timestamps();

            // Prevent duplicate marking
            $table->unique(
                ['lecture_attendance_id', 'learner_id'],
                'uniq_learner_per_lecture'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learner_attendances');
    }
};
