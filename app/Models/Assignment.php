<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Assignment extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'course_id',
        'created_by_user_id',
        'title',
        'description',
        'due_date',
        'max_points',
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];

    /**
     * Get the course that owns the assignment.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the user (instructor) who created the assignment.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    /**
     * Get the submissions for the assignment.
     */
    public function submissions()
    {
        return $this->hasMany(AssignmentSubmission::class);
    }
}