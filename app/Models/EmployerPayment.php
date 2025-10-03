<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class EmployerPayment extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'employer_payments'; // Explicitly set table name

    protected $fillable = [
        'employer_profile_id',
        'subscription_id',
        'payment_id',
        'processed_by_user_id',
    ];

    /**
     * Get the employer profile that made the payment.
     */
    public function employerProfile()
    {
        return $this->belongsTo(EmployerProfile::class);
    }

    /**
     * Get the subscription associated with the payment.
     */
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    /**
     * Get the payment transaction itself.
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * Get the user who processed this payment.
     */
    public function processor()
    {
        return $this->belongsTo(User::class, 'processed_by_user_id');
    }
}