<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LearnerAttendance extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'learner_attendances';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'lecture_attendance_id',
        'learner_id',
        'status',
        'remark',
    ];

    public function lecture()
    {
        return $this->belongsTo(
            LectureAttendance::class,
            'lecture_attendance_id'
        );
    }

    public function lectureAttendance()
{
    return $this->belongsTo(LectureAttendance::class, 'lecture_attendance_id');
}
}
