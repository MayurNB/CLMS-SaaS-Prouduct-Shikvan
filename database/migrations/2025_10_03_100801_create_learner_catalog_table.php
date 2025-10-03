<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations to create the single, flat catalog table.
     * This table stores all raw enrollment data in one place for MVP simplicity.
     */
    public function up(): void
    {
        Schema::create('learner_catalog', function (Blueprint $table) {
            $table->id();

            // --- Learner Details (Raw Input) ---
            $table->string('raw_learner_name', 255);
            $table->string('raw_email')->nullable(); // Optional field
            $table->string('raw_phone', 20)->unique(); // Key field, should be unique

            // --- Assignment and Fee Details (Raw Input) ---
            // Stores the program name as a string (since we are not linking via ID yet)
            $table->string('raw_program_name', 255); 
            
            // Stores the amount paid
            $table->decimal('raw_fee_amount', 10, 2); 
            
            // Temporary status (can be used for filtering later)
            $table->string('status', 50)->default('initial_entry'); 

            // --- Future Use Fields (Leave null for now) ---
            // These fields remain null but are ready for when you manually classify data later.
            $table->foreignId('learner_id')->nullable();
            $table->foreignId('program_id')->nullable();

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learner_catalog');
    }
};
