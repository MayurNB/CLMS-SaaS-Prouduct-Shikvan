<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnrollmentTax extends Model {
    protected $fillable = [
       'institute_id','enrollment_fees_id', 'tax_master_id', 'tax_name_snapshot', 
        'tax_percentage_snapshot', 'net_amount', 'tax_amount', 
        'final_grand_total', 'status', 'created_by'
    ];

    public function taxMaster(): BelongsTo {
        return $this->belongsTo(TaxMaster::class);
    }

    // Link this back to your main EnrollmentFees record
    public function enrollmentFee(): BelongsTo {
        return $this->belongsTo(EnrollmentFee::class, 'enrollment_fees_id');
    }
}