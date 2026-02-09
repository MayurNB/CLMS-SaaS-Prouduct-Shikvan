<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('legal_registrations', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // Polymorphic-style reference (Employer / Institute / Future entities)
            $table->string('legal_entity_type'); // App\Models\Employer, App\Models\Institute
            $table->uuid('legal_entity_id');

            // Registration info
            $table->string('register_type'); // MSME, Pvt Ltd, Trust, Proprietorship
            $table->string('register_id');

            // Optional identifiers
            $table->string('gstin')->nullable();

            // Future-proof storage
            $table->json('other_codes')->nullable(); // PAN, ISO, etc.

            $table->text('remark')->nullable();

            $table->enum('status', ['active', 'inactive'])->default('active');

            // Audit
            $table->uuid('created_by');

            $table->timestamps();

            // Indexes (performance + enterprise grade)
            $table->index(['legal_entity_type', 'legal_entity_id']);
            $table->index('register_type');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('legal_registrations');
    }
};
