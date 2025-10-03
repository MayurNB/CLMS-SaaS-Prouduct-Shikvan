<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Exam extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'course_id',
        'created_by_user_id',
        'title',
        'instructions',
        'duration_minutes',
        'available_at',
        'due_at',
        'is_published',
    ];

    protected $casts = [
        'available_at' => 'datetime',
        'due_at' => 'datetime',
    ];

    /**
     * Get the course that owns the exam.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the user (instructor) who created the exam.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    /**
     * Get the exam papers (questions) for the exam.
     */
    public function examPapers()
    {
        return $this->hasMany(ExamPaper::class);
    }

    /**
     * Get the results for the exam.
     */
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}