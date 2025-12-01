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
        Schema::create('programs', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('program_name')->default('');
            $table->string('normalized_name')->nullable();
            $table->text('description')->nullable();
            $table->integer('duration_days')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->char('institute_id', 36)->index('programs_created_by_user_id_index');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
