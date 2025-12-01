<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EnrolledCourse extends Model
{
    use HasFactory;

    // The primary key is a UUID (char(36))
   protected $table = 'enrolled_courses';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'enrollment_id', // Links to the Enrollment contract
        'course_id',     // Links to the actual Course definition
        'status',        // Tracks progress (e.g., 'in_progress', 'completed', 'failed')
    ];


     // ✅ Automatically assign UUID on create
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    /**
     * Get the Enrollment contract this course record belongs to.
     * This establishes the path back to the Learner and the Branch/Program.
     */
    public function enrollment()
    {
        // Many EnrolledCourses belong to one Enrollment
        return $this->belongsTo(Enrollment::class, 'enrollment_id', 'id');
    }

    /**
     * Get the definition of the actual Course this record tracks.
     * (Assumes a Course model exists that holds the course name, description, etc.)
     */
    public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}
}
