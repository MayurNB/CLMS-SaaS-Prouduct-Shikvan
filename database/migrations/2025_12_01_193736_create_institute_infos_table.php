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
        Schema::create('institute_infos', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('employer_id', 36)->nullable()->index();
            $table->string('institute_name')->default('');
            $table->text('description')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state_province', 100)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('contact_email')->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->string('logo_url', 2048)->nullable();
            $table->string('bg_url', 2048)->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_infos');
    }
};
