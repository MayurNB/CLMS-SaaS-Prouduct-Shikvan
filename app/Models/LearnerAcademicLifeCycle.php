<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class LearnerAcademicLifecycle extends Model
{
    use HasUuids;

    protected $fillable = [
        'learner_id', 'academic_context_id', 'enrollment_id', 
        'event_type', 'performance_snapshot', 'financial_summary', 
        'meta_data', 'created_by'
    ];

    // The "Magic" casts for history tracking
    protected $casts = [
        'performance_snapshot' => 'array',
        'financial_summary' => 'array',
        'meta_data' => 'array',
    ];

    public function context() {
        return $this->belongsTo(AcademicContext::class, 'academic_context_id');
    }
}
