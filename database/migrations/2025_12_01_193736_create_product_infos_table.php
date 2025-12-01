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
        Schema::create('product_infos', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('logo_url')->default('');
            $table->char('current_version', 36)->index();
            $table->string('terms_of_service_url')->default('');
            $table->string('privacy_policy_url')->default('');
            $table->integer('default_trial_days')->default(0);
            $table->string('admin_contact_email')->default('');
            $table->string('support_email')->default('');
            $table->string('marketing_site_url')->default('');
            $table->string('default_language')->default('en');
            $table->tinyInteger('is_maintenance_mode')->default(0);
            $table->text('maintenance_message')->nullable();
            $table->char('last_updated_by_user_id', 36)->index();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
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
