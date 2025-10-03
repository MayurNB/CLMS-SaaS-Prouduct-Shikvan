<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PricingZone extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'pricing_zones';

    protected $fillable = [
        'zone_name',
        'description',
    ];

    /**
     * Get the packages for the pricing zone.
     */
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_pricing_zone');
    }

    /**
     * Get the program prices for the pricing zone.
     */
    public function programPrices()
    {
        return $this->hasMany(ProgramPrice::class);
    }
}