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
        Schema::create('program_tags', function (Blueprint $table) {
            $table->char('program_id', 36);
            $table->char('tag_id', 36)->index('program_tags_tag_id_foreign');
            $table->timestamp('created_at')->useCurrent();

            $table->primary(['program_id', 'tag_id']);
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
