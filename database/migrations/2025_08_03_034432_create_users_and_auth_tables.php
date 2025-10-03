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
        // 1. users table
        Schema::create('users', function (Blueprint $table) {
            // Primary key using CHAR(36) for UUID consistency
            $table->char('id', 36)->primary();

            $table->string('name')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
           

   
            // Corrected 'UserName' to 'username' (common convention), string type, unique, NOT NULL with default
            $table->string('username', 255)->unique()->nullable(false)->default('');
            $table->string('password')->nullable(false);
            $table->rememberToken()->nullable(); // 'remember_token' can be null

            // Timestamps with NOT NULL and proper defaults
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        // 2. password_reset_tokens table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // 3. sessions table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            // 'user_id' as char(36) to match users.id type
            $table->char('user_id', 36)->nullable()->index(); // Indexed for performance
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index(); // Indexed for performance

            // Foreign key to the 'users' table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};