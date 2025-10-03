<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Package extends Model
{
    use HasFactory, HasUuids;

    // IMPORTANT: We need to specify the primary key name here
    protected $primaryKey = 'package_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'package_name',
        'description',
        'min_learner_capacity',
        'max_learner_capacity',
        'base_per_learner_rate_urban',
        'instructor_capacity_limit',
        'storage_limit_mb',
        'features',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    /**
     * Get the subscriptions that use this package.
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Get the pricing zones for the package.
     */
    public function pricingZones()
    {
        return $this->belongsToMany(PricingZone::class, 'package_pricing_zone');
    }
}