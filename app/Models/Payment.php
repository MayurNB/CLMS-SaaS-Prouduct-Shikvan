<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Payment extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'amount',
        'payment_method',
        'transaction_id',
        'status',
        'paid_at',
        'payable_id',
        'payable_type',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    /**
     * Get the parent model that the payment belongs to (polymorphic).
     */
    public function payable()
    {
        return $this->morphTo();
    }
}