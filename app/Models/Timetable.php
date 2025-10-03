<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Timetable extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'branch_id',
        'course_id',
        'program_id',
        'title',
        'day_of_week',
        'start_time',
        'end_time',
        'room_number',
        'instructor_user_id',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    /**
     * Get the branch that owns the timetable entry.
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Get the course associated with the timetable entry.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the program associated with the timetable entry.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the instructor (user) for this timetable entry.
     */
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_user_id');
    }

    /**
     * Get the attendance records for this timetable entry.
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}