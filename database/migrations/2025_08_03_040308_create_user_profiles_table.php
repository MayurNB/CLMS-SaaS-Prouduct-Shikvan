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
        Schema::create('user_profiles', function (Blueprint $table) {
            // Primary key using CHAR(36) for UUID consistency
            $table->char('id', 36)->primary();

            // Foreign key to users table, char(36) to match users.id type
            $table->char('user_id', 36)->unique(); // Unique as each user has one profile

            // First and last name, NOT NULL with default empty string
            $table->string('first_name', 100)->nullable(false)->default('');
            $table->string('last_name', 100)->nullable(false)->default('');

            // Other profile fields, correctly nullable
            $table->date('date_of_birth')->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('address_line_1', 255)->nullable();
            $table->string('address_line_2', 255)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state_province', 100)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('profile_picture_url', 2048)->nullable(); // URL can be longer
            $table->text('bio')->nullable();
            $table->string('preferred_language', 10)->nullable();
            $table->string('preferred_timezone', 100)->nullable();
            $table->json('metadata')->nullable(); // Flexible JSON field

            // Timestamps with NOT NULL and proper defaults
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraint: If a user is deleted, their profile is also deleted (CASCADE)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};