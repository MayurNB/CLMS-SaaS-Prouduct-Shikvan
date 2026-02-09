<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Timetable extends Model
{
    use HasUuids;

    protected $table = 'timetables';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'institute_id',
        'branch_id',
        'program_id',
        'batch_id',
        'course_id',
        'instructor_id',
        'title',
        'day',
        'sequence_no',
        'start_time',
        'end_time',
        'classroom',
        'status',
        'created_by',
    ];

    protected $casts = [
        'start_time' => 'string',
        'end_time'   => 'string',
    ];

    /* ================= RELATIONS ================= */

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function program()
{
    return $this->belongsTo(Program::class);
}

    
}
