<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Fee extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'fee_name',
        'amount',
        'type',
        'course_id',
        'program_id',
    ];

    /**
     * Get the course associated with the fee.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the program associated with the fee.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}