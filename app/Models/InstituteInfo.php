<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstituteInfo extends Model
{
    protected $table = 'institute_infos';

    protected $fillable = [
        'id',
        'employer_id',
        'institute_name',
        'description',
        'address_line_1',
        'city',
        'state_province',
        'postal_code',
        'country',
        'contact_email',
        'phone_number',
        'logo_url',
        'bg_url',
        'is_active',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
