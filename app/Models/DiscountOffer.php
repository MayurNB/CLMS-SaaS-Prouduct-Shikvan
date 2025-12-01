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
        'name',
        'description_public',
        'description_internal',
        'type',
        'value',
        'start_date',
        'end_date',
        'is_active',
        'program_id',
        'course_id',
        'institute_id',
    ];

    /**
     * Get the program prices that have this discount offer.
     */
    public function programPrices()
    {
        return $this->hasMany(ProgramPrice::class, 'discount_offer_id');
    }

    /**
     * The program this discount offer belongs to (if linked directly).
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * The course this discount offer belongs to (if linked directly).
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
