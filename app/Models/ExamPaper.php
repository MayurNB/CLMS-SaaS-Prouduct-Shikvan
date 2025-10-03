<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ExamPaper extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'exam_papers'; // Explicitly set table name

    protected $fillable = [
        'exam_id',
        'question_text',
        'question_type',
        'points',
        'options',
        'correct_answer',
    ];

    protected $casts = [
        'options' => 'array', // Assuming options are stored as JSON
    ];

    /**
     * Get the exam that owns the exam paper.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}