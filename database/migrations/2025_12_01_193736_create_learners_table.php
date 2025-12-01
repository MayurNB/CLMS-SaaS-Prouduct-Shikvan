<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('learners', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('raw_learner_name');
            $table->string('raw_email')->nullable();
            $table->string('raw_phone', 20)->nullable();
            $table->string('status', 50)->default('initial_entry');
            $table->char('user_id', 36)->nullable()->index('learner_catalog_user_id_index');
            $table->string('learner_code', 20)->nullable()->unique();
            $table->char('created_by', 36)->index('learner_catalog_created_by_index');
            $table->timestamps();
            $table->char('branch_id', 36);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learners');
    }
};
