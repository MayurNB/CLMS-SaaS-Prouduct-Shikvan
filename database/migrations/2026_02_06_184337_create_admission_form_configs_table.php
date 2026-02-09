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
        Schema::create('admission_form_configs', function (Blueprint $table) {
           $table->uuid('id')->primary();
    $table->uuid('institute_id')->index();
    $table->string('type'); // text, file, select, etc.
    $table->string('field_name'); // e.g., 'previous_marks'
    $table->string('field_label'); // e.g., '10th Standard Marks'
    $table->boolean('is_required')->default(false);
    $table->uuid('created_by');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_form_configs');
    }
};
