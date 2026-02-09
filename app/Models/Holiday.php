<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Holiday extends Model
{
    use HasUuids;

    protected $table = 'holidays';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'institute_id',
        'branch_id',
        'holiday_date',
        'holiday_type',
        'reason',
        'status',
        'created_by',
    ];

    protected $casts = [
        'holiday_date' => 'date',
    ];

    /**
     * Scopes (optional but useful)
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeForInstitute($query, $instituteId)
    {
        return $query->where('institute_id', $instituteId);
    }

    public function scopeForBranchOrGlobal($query, $branchId)
    {
        return $query->where(function ($q) use ($branchId) {
            $q->where('branch_id', $branchId)
              ->orWhereNull('branch_id');
        });
    }
}
