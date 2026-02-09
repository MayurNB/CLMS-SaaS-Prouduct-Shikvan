<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Batch extends Model
{
    use HasFactory;

    protected $table = 'batches';

    /**
     * UUID primary key configuration
     */
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'institute_id',
        'branch_id',
        'program_id',
        'batch_code',
        'batch_name',
        'description',
        'max_size',
        'current_size',
        'start_date',
        'end_date',
        'academic_year',
        'status',
        'batch_type',
        'created_by',
        'updated_by',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    /**
     * Auto-generate UUID on create
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    /* =======================
       Relationships (Optional but Correct)
       ======================= */

    public function institute()
    {
        return $this->belongsTo(InstituteInfo::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
