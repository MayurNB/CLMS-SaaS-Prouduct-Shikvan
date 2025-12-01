<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentFee extends Model
{
    use HasFactory;

    protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        if (empty($model->id)) {
            $model->id = (string) \Illuminate\Support\Str::uuid();
        }
    });
}


    // The primary key is a UUID (char(36))
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'enrollment_id',      // Foreign key to the Enrollment contract (UNI key)
        'total_fee_charged',  // The gross amount due
        'paid_amount',        // The total amount collected to date
        'discount_applied',   // The total discount amount
        'fee_status',         // e.g., 'partial', 'paid', 'overdue'
    ];

    protected $casts = [
        'total_fee_charged' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'discount_applied' => 'decimal:2',
    ];

    /**
     * Get the Enrollment contract this fee record belongs to.
     */
    public function enrollment()
    {
        // One EnrollmentFee belongs to one Enrollment (1-to-1 relationship)
        return $this->belongsTo(Enrollment::class, 'enrollment_id', 'id');
    }

    /**
     * Get all the individual payment transactions made toward this fee.
     * This uses the polymorphic relationship defined in the payments table.
     */
    public function payments()
    {
        // Many payments belong to this single financial record
        return $this->morphMany(Payment::class, 'payable');
    }
}