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
        'price_type',
        'base_price',
        'discount_offer_id',
        'internal_notes',
        'is_active',
        'institute_id',
    ];

    /**
     * Get the program associated with the price.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the discount offer associated with the price.
     */
    public function discountOffer()
    {
        return $this->belongsTo(DiscountOffer::class);
    }
}
