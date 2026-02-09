<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxMaster extends Model
{
    // 1. Tell Laravel the ID is not an integer
    protected $keyType = 'string';

    // 2. Tell Laravel the ID does not auto-increment
    public $incrementing = false;

    // 3. Ensure 'id' is in the fillable array so it can be mass-assigned
    protected $fillable = [
        'id',
        'tax_name',
        'tax_code',
        'tax_percentage',
        'remark',
        'status',
        'created_by',
        'updated_by'
    ];
}