<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class InstructorCourseAssignment extends Model
{
    use HasFactory, HasUuids;

    /**
     * Table name
     */
    protected $table = 'instructor_course_assignments';

    /**
     * Primary key type
     */
    protected $keyType = 'string';
    public $incrementing = false; // UUID is not auto-increment

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'id',             // optional, Laravel generates UUID automatically
        'institute_id',
        'branch_id',
        'program_id',
        'course_id',
        'user_id',        // instructor
        'status',
        'created_by',
    ];

    /**
     * Default attributes
     */
    protected $attributes = [
        'status' => self::STATUS_ACTIVE,
    ];

    /**
     * Status constants
     */
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_SUSPENDED = 'suspended';

    /**
     * Relationships
     * Note: define related models as needed
     */

    // Instructor user
    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Program
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    // Branch (nullable)
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    // Institute
    public function institute()
    {
        return $this->belongsTo(Instituteinfo::class, 'institute_id');
    }

    /**
     * Scope to get active assignments
     */
    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    /**
     * Optional helper: check if branch applies to all (nullable)
     */
    public function isGlobal()
    {
        return is_null($this->branch_id);
    }
}
