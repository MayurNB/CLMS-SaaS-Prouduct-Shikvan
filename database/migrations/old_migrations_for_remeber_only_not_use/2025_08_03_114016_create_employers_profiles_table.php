<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employers_profiles', function (Blueprint $table) {
            // Primary key for the employer profile
            $table->char('id', 36)->primary();
            
            // Link to the user who created or acts as the main contact for this employer
            $table->char('user_id', 36)->unique()->index();

            $table->string('company_name', 255)->nullable(false)->default('');
            $table->string('industry', 100)->nullable();
            $table->string('company_size', 50)->nullable();
            $table->string('address_line_1', 255)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state_province', 100)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('website_url', 255)->nullable();
            $table->string('logo_url', 2048)->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->json('settings')->nullable(); // For flexible, specific settings
            $table->char('onboarded_by_user_id', 36)->nullable()->index(); // User who onboarded this employer

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE CASCADE: If the main user is deleted, their employer profile is also deleted.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('onboarded_by_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers_profiles');
    }
};