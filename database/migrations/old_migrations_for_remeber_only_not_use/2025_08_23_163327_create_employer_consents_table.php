<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_consents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('employer_id')->comment('Links to the employer profile that gave consent.');
            $table->string('consent_type', 50)->comment('e.g., terms_and_conditions, privacy_policy.');
            $table->string('consent_version', 20)->comment('The version of the legal document.');
            $table->boolean('is_accepted')->default(true)->comment('Flag to confirm consent was given (1 = accepted).');
            $table->string('ip_address', 45)->nullable()->comment('IP address of the user at the time of consent.');
            $table->timestamp('consented_at')->useCurrent()->comment('Timestamp of when consent was given.');

            $table->unique(['employer_id', 'consent_type'], 'idx_employer_consent_type');

            $table->foreign('employer_id')
                  ->references('id')
                  ->on('employers_profiles')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employer_consents');
    }
};