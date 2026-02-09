<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LearnerBatch extends Model
{
    protected $table = 'learner_batch';

    /**
     * UUID Primary Key Config
     */
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'institute_id',
        'branch_id',
        'program_id',
        'batch_id',
        'learner_id',
        'status',
        'created_by',
    ];

    /**
     * Auto-generate UUID on create
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    /* =========================
     | Relationships (Optional)
     ========================= */

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function learner()
    {
        return $this->belongsTo(User::class, 'learner_id');
    }

    public function institute()
    {
        return $this->belongsTo(Instituteinfo::class, 'institute_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
