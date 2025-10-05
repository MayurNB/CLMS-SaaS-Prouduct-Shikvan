<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EmployerProfile extends Model
{
    use HasFactory;

    protected $table = 'employers_profiles';

    // Primary key is UUID
    protected $primaryKey = 'id';
    public $incrementing = false;   // not auto increment
    protected $keyType = 'string';  // UUID is string

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
     * Get the user that owns the employer profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
