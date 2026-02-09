<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Admission extends Model
{
    use HasUuids;

    protected $fillable = [
        'institute_id', 'token_id', 'branch_id', 'learner_name', 
        'phone_no', 'email', 'form_data', 'status', 'verified_at', 'verified_by'
    ];

    // This converts the JSON from DB to a PHP Array automatically
    protected $casts = [
        'form_data' => 'array',
        'verified_at' => 'datetime',
    ];

    public function token() {
        return $this->belongsTo(AdmissionToken::class, 'token_id');
    }
}