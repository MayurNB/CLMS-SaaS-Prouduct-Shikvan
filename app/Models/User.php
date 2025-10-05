<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Role;

class User extends Authenticatable
{
    use  HasFactory, Notifiable, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * The roles that belong to the user.
     */
    public function roles(): BelongsToMany
{
    return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id')
        ->withPivot('status', 'assigned_by', 'activated_at', 'created_at', 'updated_at')
        ->withTimestamps()
        ->wherePivot('status', 'active'); // <-- CRITICAL FIX: Only load active roles
}
    
    /**
     * Get the "Role" attribute for the user.
     * This accessor provides a single 'Role' string for the switch statement.
     * It prioritizes 'Admin' if present, otherwise returns the name of the first role found.
     */
    public function getRoleAttribute(): ?string
    {
        if (!$this->relationLoaded('roles')) {
            $this->load('roles');
        }

        if ($this->hasRole('Admin')) {
            return 'Admin';
        }

        return $this->roles->first()->name ?? null;
    }

    /**
     * Check if the user has a specific role.
     */
    public function hasRole(string $roleName): bool
    {
        return $this->roles->contains('name', $roleName);
    }

    /**
     * Get the user profile associated with the user.
     */
    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }
    
    /**
     * Get the employer profile associated with the user.
     */
    public function employerProfile()
    {
        return $this->hasOne(EmployerProfile::class);
    }
}
