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
        Schema::create('branches', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // Link to the institute this branch belongs to
            $table->char('institute_id', 36)->index();

            $table->string('branch_name', 255)->nullable(false)->default('');
            $table->string('address_line_1', 255)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state_province', 100)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('contact_email', 255)->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->tinyInteger('is_active')->default(1);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            // ON DELETE CASCADE: If an institute is deleted, all its branches are also deleted.
            $table->foreign('institute_id')->references('id')->on('institute_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};