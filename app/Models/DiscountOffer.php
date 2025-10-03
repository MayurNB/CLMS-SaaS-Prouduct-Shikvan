<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DiscountOffer extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'discounts_offers';

    protected $fillable = [
        'offer_name',
        'description',
        'discount_type',
        'discount_value',
        'start_date',
        'end_date',
        'is_active',
    ];

    /**
     * Get the program prices that have this discount offer.
     */
    public function programPrices()
    {
        return $this->hasMany(ProgramPrice::class);
    }
}