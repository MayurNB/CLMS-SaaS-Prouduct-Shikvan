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
        Schema::create('product_version_histories', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('version_number')->default('');
            $table->date('release_date')->nullable();
            $table->char('released_by_id', 36)->index();
            $table->text('release_notes')->nullable();
            $table->tinyInteger('is_major_release')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_version_histories');
    }
};
