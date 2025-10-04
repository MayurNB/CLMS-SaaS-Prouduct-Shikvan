<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('learner_catalog', function (Blueprint $table) {
    $table->char('created_by', 36)->after('program_id'); // store UUID
    $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
});
    }

    public function down(): void
    {
        Schema::table('learner_catalog', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });
    }
};
