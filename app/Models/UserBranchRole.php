<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBranchRole extends Model
{
    protected $table = 'user_branch_roles';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'branch_id',
        'role_id',
        'is_active'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id'); // ✅ Fixed
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
