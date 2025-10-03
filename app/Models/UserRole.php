<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserRole extends Pivot
{
    protected $table = 'user_roles';
    
    // As per your table schema, the primary key is a composite of user_id and role_id
    protected $primaryKey = ['user_id', 'role_id'];
    public $incrementing = false;
    protected $keyType = 'string';
}
