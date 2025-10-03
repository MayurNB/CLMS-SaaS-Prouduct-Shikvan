<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnerCatalog extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'learner_catalog';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'raw_learner_name',
        'raw_email',
        'raw_phone',
        'raw_program_name',
        'raw_fee_amount',
        'status',
        'learner_id', 
        'program_id', 
    ];

    /**
     * The attributes that should be cast.
     * We are removing the 'raw_fee_amount' => 'decimal' cast
     * as it is the most likely source of the Serialization Error: Undefined array key 1.
     * It will now be treated as a standard string/float retrieved from the DB.
     */
    protected $casts = [
        // 'raw_fee_amount' => 'decimal', // Removed
    ];
}
