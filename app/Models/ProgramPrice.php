<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProgramPrice extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'program_prices';

    protected $fillable = [
        'program_id',
        'pricing_zone_id',
        'discount_offer_id',
        'price',
        'start_date',
        'end_date',
        'is_active',
    ];

    /**
     * Get the program associated with the price.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the pricing zone associated with the price.
     */
    public function pricingZone()
    {
        return $this->belongsTo(PricingZone::class);
    }

    /**
     * Get the discount offer associated with the price.
     */
    public function discountOffer()
    {
        return $this->belongsTo(DiscountOffer::class);
    }
}