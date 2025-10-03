<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePermission extends Pivot
{
    protected $table = 'role_permissions';

    // As per your table schema, the primary key is a composite of role_id and permission_id
    protected $primaryKey = ['role_id', 'permission_id'];
    public $incrementing = false;
    protected $keyType = 'string';
}
