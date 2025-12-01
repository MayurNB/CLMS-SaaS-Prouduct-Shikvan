<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Branch extends Model
{
    protected $table = 'branches';
    public $incrementing = false;  
    protected $keyType = 'string'; 

    protected $fillable = [
        'id',
        'institute_id',
        'branch_name',
        'address_line_1',
        'city',
        'state_province',
        'postal_code',
        'country',
        'contact_email',
        'phone_number',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function institute()
    {
        return $this->belongsTo(InstituteInfo::class, 'institute_id');
    }

    public function userBranchRoles()
    {
        return $this->hasMany(UserBranchRole::class, 'branch_id', 'id');
    }
}
