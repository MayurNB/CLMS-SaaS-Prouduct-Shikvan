<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class AdmissionToken extends Model
{
    use HasUuids;

    protected $fillable = [
        'token', 'institute_id', 'branch_id', 'status', 'expires_at', 'created_by'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];
}
