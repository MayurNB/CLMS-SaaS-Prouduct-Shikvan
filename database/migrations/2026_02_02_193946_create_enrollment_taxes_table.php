<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('enrollment_taxes', function (Blueprint $table) {
    $table->char('id', 36)->primary(); // UUID Primary Key
    
    // Links to other tables (Assuming enrollment_fees also uses UUID)
    $table->char('enrollment_fees_id', 36); 
    $table->char('tax_master_id', 36);
    
    $table->string('tax_name_snapshot');
    $table->decimal('tax_percentage_snapshot', 5, 2);
    $table->decimal('net_amount', 15, 2);
    $table->decimal('tax_amount', 15, 2);
    $table->decimal('final_grand_total', 15, 2);
    
    // User Link (UUID)
    $table->char('created_by', 36);
    $table->foreign('created_by')->references('id')->on('users');

    $table->timestamps();
});
    }

    public function down(): void {
        Schema::dropIfExists('enrollment_taxes');
    }
};
