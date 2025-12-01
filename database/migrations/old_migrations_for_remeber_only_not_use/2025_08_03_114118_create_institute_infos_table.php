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
        Schema::create('institute_infos', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // Link to the employer who owns this institute
            $table->char('employer_id', 36)->index();

            $table->string('institute_name', 255)->nullable(false)->default('');
            $table->text('description')->nullable();
            $table->string('address_line_1', 255)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state_province', 100)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('contact_email', 255)->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->string('logo_url', 2048)->nullable();
             $table->string('bg_url', 2048)->nullable();
            $table->tinyInteger('is_active')->default(1);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE CASCADE: If an employer is deleted, all their institutes are also deleted.
            $table->foreign('employer_id')->references('id')->on('employers_profiles')->onDelete('cascade');
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