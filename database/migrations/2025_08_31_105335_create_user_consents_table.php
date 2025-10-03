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
        Schema::create('user_consents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->comment('Links to the user that gave consent.');
            $table->string('consent_type', 50)->comment('e.g., terms_and_conditions, privacy_policy.');
            $table->string('consent_version', 20)->comment('The version of the legal document.');
            $table->boolean('is_accepted')->default(true)->comment('Flag to confirm consent was given (1 = accepted).');
            $table->string('ip_address', 45)->nullable()->comment('IP address of the user at the time of consent.');
            $table->timestamp('consented_at')->useCurrent()->comment('Timestamp of when consent was given.');

            // Ensure one consent type per user
            $table->unique(['user_id', 'consent_type'], 'idx_user_consent_type');

            // Foreign key to users table
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_consents');
    }
};
