<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class AssignmentSubmission extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'assignment_submissions'; // Explicitly set table name

    protected $fillable = [
        'assignment_id',
        'submitted_by_user_id',
        'submission_text',
        'file_url',
        'submission_date',
        'points_awarded',
        'feedback',
    ];

    protected $casts = [
        'submission_date' => 'datetime',
    ];

    /**
     * Get the assignment that owns the submission.
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * Get the user (learner) who submitted the assignment.
     */
    public function submitter()
    {
        return $this->belongsTo(User::class, 'submitted_by_user_id');
    }
}