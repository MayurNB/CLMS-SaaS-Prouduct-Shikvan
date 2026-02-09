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
        Schema::create('admission_tokens', function (Blueprint $table) {
            $table->uuid('id')->primary();
    $table->string('token')->unique();
    $table->uuid('institute_id');
    $table->uuid('branch_id');
    $table->enum('status', ['active', 'used', 'expired'])->default('active');
    $table->timestamp('expires_at');
    $table->uuid('created_by');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_tokens');
    }
};
