<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LegalRegistration extends Model
{
    protected $table = 'legal_registrations';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'legal_entity_type',
        'legal_entity_id',
        'register_type',
        'register_id',
        'gstin',
        'other_codes',
        'remark',
        'status',
        'created_by',
    ];

    protected $casts = [
        'other_codes' => 'array',
    ];

    /**
     * Auto-generate UUID
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
