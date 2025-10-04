<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnerCatalog extends Model
{
    use HasFactory;

    protected $table = 'learner_catalog';

    protected $fillable = [
        'raw_learner_name',
        'raw_email',
        'raw_phone',
        'raw_program_name',
        'raw_fee_amount',
        'status',
        'learner_id', 
        'program_id', 
        'created_by',  // <--- Add this
    ];

    protected $casts = [
        // 'raw_fee_amount' => 'decimal', // optional
    ];
}
