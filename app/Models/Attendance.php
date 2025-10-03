<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Attendance extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'timetable_id',
        'user_id',
        'status',
        'attendance_date',
    ];

    protected $casts = [
        'attendance_date' => 'date',
    ];

    /**
     * Get the timetable entry that owns the attendance record.
     */
    public function timetable()
    {
        return $this->belongsTo(Timetable::class);
    }

    /**
     * Get the user (learner) who owns the attendance record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}