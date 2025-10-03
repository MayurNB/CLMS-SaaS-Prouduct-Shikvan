<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Subscription extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'employer_profile_id',
        'package_id',
        'initiated_by_user_id',
        'status',
        'start_date',
        'end_date',
        'price',
        'payment_frequency',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * Get the employer profile that owns the subscription.
     */
    public function employerProfile()
    {
        return $this->belongsTo(EmployerProfile::class);
    }

    /**
     * Get the package associated with the subscription.
     */
    public function package()
    {
        // Remember that the primary key of packages is 'package_id'
        return $this->belongsTo(Package::class, 'package_id', 'package_id');
    }

    /**
     * Get the user who initiated the subscription.
     */
    public function initiator()
    {
        return $this->belongsTo(User::class, 'initiated_by_user_id');
    }

    /**
     * Get the employer payments for this subscription.
     */
    public function employerPayments()
    {
        return $this->hasMany(EmployerPayment::class);
    }
}