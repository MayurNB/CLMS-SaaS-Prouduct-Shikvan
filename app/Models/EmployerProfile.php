<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\InstituteInfo;

class EmployerProfile extends Model
{
    use HasFactory;

    protected $table = 'employers_profiles';

    // Primary key is UUID
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'user_id',
        'company_name',
        'industry',
        'onboarded_by_user_id',
    ];

    /**
     * Auto-generate UUID when creating new record
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

    /**
     * User relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Institute relationship
     */
    public function institute()
    {
        return $this->hasOne(InstituteInfo::class, 'employer_id', 'id');
    }

    /**
     * Optional helper: get institute name safely
     */
    public function getInstituteName(): ?string
    {
        return $this->institute?->name;
    }
}
