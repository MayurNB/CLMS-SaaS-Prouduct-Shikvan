<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LectureAttendance extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'lecture_attendances';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'attendance_date',
        'timetable_id',
        'institute_id',
        'branch_id',
        'program_id',
        'batch_id',
        'course_id',
        'instructor_id',
        'classroom',
        'actual_start_time',
        'actual_end_time',
        'is_guest_lecture',
        'guest_name',
        'remark',
        'created_by',
    ];

    protected $casts = [
        'attendance_date' => 'date',
        'is_guest_lecture' => 'boolean',
    ];

    public function learners()
    {
        return $this->hasMany(
            LearnerAttendance::class,
            'lecture_attendance_id'
        );
    }

    // In App\Models\LectureAttendance.php
public function program() {
    return $this->belongsTo(Program::class, 'program_id');
}

public function course() {
    return $this->belongsTo(Course::class, 'course_id');
}

public function batch() {
    return $this->belongsTo(Batch::class, 'batch_id');
}

public function instructor() 
{
    // instructor_id in lecture_attendances table links to id in users table
    return $this->belongsTo(User::class, 'instructor_id', 'id');
}
}
