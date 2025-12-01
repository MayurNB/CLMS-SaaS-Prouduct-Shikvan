<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollmentDiscount extends Model
{
    protected $table = 'enrollment_discounts';

    // No auto-increment ID, so disable incrementing
    public $incrementing = false;

    // UUIDs are strings, not integers
    protected $keyType = 'string';

    // Composite primary key (not directly supported by Eloquent, so we’ll handle manually if needed)
    protected $primaryKey = null;

    // Allow mass assignment
    protected $fillable = [
        'enrollment_id',
        'discount_id',
        'discount_amount',
        'applied_date',
        'created_at',
        'updated_at',
    ];

    // Disable default timestamps if you want to manage manually (optional)
    public $timestamps = true;
}
