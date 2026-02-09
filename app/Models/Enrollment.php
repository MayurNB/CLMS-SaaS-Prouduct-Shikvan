<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use App\Models\EnrolledCourse;

class Enrollment extends Model
{
    use HasFactory;

    // The primary key is a UUID (char(36)), so we set these properties
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $table = 'enrollments';

    protected $fillable = [
        'id',
        'learner_id',
        'program_id',
        'branch_id',
        'enrollment_date',
        'status',
        
    ];

   

    // ✅ Auto-generate UUID before create
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
     * Define the relationship to the Learner (Person/Identity).
     */
     public function learner()
    {
        return $this->belongsTo(Learners::class, 'learner_id', 'id');
    }

    /**
     * Define the relationship to the financial record for this enrollment.
     */
    public function enrollmentFee() // Changed from 'fee' to 'enrollmentFee'
{
    return $this->hasOne(EnrollmentFee::class, 'enrollment_id', 'id');
}

    /**
     * Define the relationship to the courses included in this enrollment.
     */
    public function enrolledCourses()
    {
        // One Enrollment can have many EnrolledCourses
        return $this->hasMany(EnrolledCourse::class, 'enrollment_id', 'id');
    }

    /**
     * Define the relationship to the Program (What the learner is studying).
     */
    public function program()
    {
        // One Enrollment belongs to one Program
        return $this->belongsTo(Program::class, 'program_id');
    }

    /**
     * Define the relationship to the Branch (Where the learner is studying).
     */
    public function branch()
    {
        // One Enrollment belongs to one Branch
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function courses()
{
    return $this->hasMany(EnrolledCourse::class, 'enrollment_id');
}
}