<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Role;
use App\Models\UserProfile;
use App\Models\EmployerProfile;
use App\Models\UserBranchRole;

use App\Models\Learners;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * Hidden attributes for serialization
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Roles relationship (only active roles)
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id')
            ->withPivot('status', 'assigned_by', 'activated_at', 'created_at', 'updated_at')
            ->withTimestamps()
            ->wherePivot('status', 'active');
    }

    /**
     * Accessor for single Role string
     */
    public function getRoleAttribute(): ?string
    {
        if (!$this->relationLoaded('roles')) {
            $this->load('roles');
        }

        if ($this->hasRole('Admin')) {
            return 'Admin';
        }

        return $this->roles->first()?->name;
    }

    /**
     * Check if user has specific role
     */
    public function hasRole(string $roleName): bool
    {
        return $this->roles->contains('name', $roleName);
    }

    /**
     * User profile relationship
     */
    public function userProfile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    /**
     * Employer profile relationship
     */
    public function employerProfile()
    {
        return $this->hasOne(EmployerProfile::class, 'user_id', 'id');
    }

    /**
     * Branch roles relationship
     */
    public function branchRoles()
    {
        return $this->hasMany(UserBranchRole::class, 'user_id', 'id');
    }

    public function branches()
{
    return $this->belongsToMany(Branch::class, 'user_branch_roles')
        ->withPivot('role_id', 'is_active') // ✅ use actual existing columns
        ->withTimestamps();
}

// 🔹 Optional helper
public function getCurrentBranchIdAttribute()
{
    return session('branch_id') ?? $this->branches()->first()?->id;
}

    /**
     * Optional helper: get institute via employer profile
     */
    public function institute()
    {
        return $this->employerProfile()?->institute();
    }

    public function learner() {
    return $this->hasOne(Learners::class, 'user_id', 'id');
}

}
