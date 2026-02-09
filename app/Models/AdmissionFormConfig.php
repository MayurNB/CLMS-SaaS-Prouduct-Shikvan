<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class AdmissionFormConfig extends Model
{
    use HasUuids; // This handles the CHAR(36) ID automatically

    protected $fillable = [
        'id', 'institute_id', 'type', 'field_name', 'field_label', 'is_required', 'created_by'
    ];
}