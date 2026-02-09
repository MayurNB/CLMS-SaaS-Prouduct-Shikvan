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
        Schema::create('admission', function (Blueprint $table) {
            $table->uuid('id')->primary();
    $table->uuid('institute_id');
    $table->uuid('token_id')->constrained('admission_tokens');
    $table->uuid('branch_id');
    $table->string('learner_name');
    $table->string('phone_no');
    $table->string('email')->nullable();
    $table->json('form_data'); // Stores the dynamic fields based on config
    $table->enum('status', ['pending', 'verified', 'approved', 'rejected'])->default('pending');
    $table->timestamp('verified_at')->nullable();
    $table->uuid('verified_by')->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission');
    }
};
