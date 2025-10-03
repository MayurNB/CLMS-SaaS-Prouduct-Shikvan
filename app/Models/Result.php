<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Result extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'exam_id',
        'total_points',
        'points_awarded',
        'completed_at',
        'status',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    /**
     * Get the user who owns the result.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the exam that the result is for.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}