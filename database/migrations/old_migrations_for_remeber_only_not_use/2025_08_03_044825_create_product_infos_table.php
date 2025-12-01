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
        Schema::create('product_infos', function (Blueprint $table) {
            // Primary key using CHAR(36) for UUID consistency
            $table->char('id', 36)->primary();

            $table->string('logo_url', 255)->nullable(false)->default('');


            // Foreign key to product_version_histories (for the current version)
            $table->char('current_version', 36)->index(); // Index for FK performance

            $table->string('terms_of_service_url', 255)->nullable(false)->default('');
            $table->string('privacy_policy_url', 255)->nullable(false)->default('');
            $table->integer('default_trial_days')->default(0);
            $table->string('admin_contact_email', 255)->nullable(false)->default('');
            $table->string('support_email', 255)->nullable(false)->default('');
            $table->string('marketing_site_url', 255)->nullable(false)->default('');
            $table->string('default_language', 255)->default('en');
            $table->tinyInteger('is_maintenance_mode')->default(0);
            $table->text('maintenance_message')->nullable(); // Made nullable

            // Foreign key to users table (for the user who last updated this info)
            $table->char('last_updated_by_user_id', 36)->index(); // Index for FK performance

            // Timestamps with NOT NULL and proper defaults
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE RESTRICT: Don't delete product info if a version or user is deleted.
            $table->foreign('current_version')->references('id')->on('product_version_histories')->onDelete('restrict');
            $table->foreign('last_updated_by_user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_infos');
    }
};