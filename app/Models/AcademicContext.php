<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class AcademicContext extends Model
{
    use HasUuids;

    protected $fillable = [
        'institute_id', 'label', 'academic_year', 'stream', 
        'level', 'current_year', 'current_term', 'is_active'
    ];

    public function lifecycles() {
        return $this->hasMany(LearnerAcademicLifecycle::class);
    }
}
