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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            // The employer's profile that holds this subscription
            $table->char('employer_profile_id', 36)->index();

            // The package to which the employer is subscribed
            $table->char('package_id', 36)->index();

            // The user who initiated this subscription (e.g., the employer's admin)
            $table->char('initiated_by_user_id', 36)->nullable()->index();

            $table->string('status', 50)->default('active');
            $table->timestamp('start_date')->nullable(false);
            $table->timestamp('end_date')->nullable();

            $table->decimal('price', 10, 2)->nullable(false);
            $table->string('payment_frequency', 50)->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key constraints
            $table->foreign('employer_profile_id')->references('id')->on('employers_profiles')->onDelete('cascade');

            // This is the corrected line referencing 'package_id' in the 'packages' table.
            $table->foreign('package_id')->references('package_id')->on('packages')->onDelete('restrict');

            $table->foreign('initiated_by_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};