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
        Schema::create('program_tags', function (Blueprint $table) {
            // Composite Primary Key for the many-to-many relationship
            $table->char('program_id', 36);
            $table->char('tag_id', 36);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->primary(['program_id', 'tag_id']); // Define composite primary key

            // Foreign key constraints
            // ON DELETE CASCADE: If a program is deleted, its tag associations are removed.
            // ON DELETE CASCADE: If a tag is deleted, its program associations are removed.
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_tags');
    }
};