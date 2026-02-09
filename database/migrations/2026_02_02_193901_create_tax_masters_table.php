<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   public function up(): void {
    Schema::create('tax_masters', function (Blueprint $table) {
    $table->char('id', 36)->primary(); // UUID Primary Key
    $table->string('tax_name');
    $table->string('tax_code')->nullable();
    $table->decimal('tax_percentage', 5, 2);
    $table->text('remark')->nullable();
    $table->boolean('status')->default(true);
    
    // User Links (UUID)
    $table->char('created_by', 36);
    $table->foreign('created_by')->references('id')->on('users');
    $table->char('updated_by', 36)->nullable();
    $table->foreign('updated_by')->references('id')->on('users');
    
    $table->timestamps();
});
}

    public function down(): void {
        Schema::dropIfExists('tax_masters');
    }
};