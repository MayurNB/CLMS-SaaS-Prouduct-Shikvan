<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learners extends Model
{
    use HasFactory;

    protected $table = 'learners'; 

    protected $fillable = [
        'id',
        'raw_learner_name',
        'raw_email',
        'raw_phone',
        'status',
        'user_id',
        'learner_code',
        'created_by',
        'branch_id',
    ];


    // 🧩 Add these two lines:
    protected $keyType = 'string';
    public $incrementing = false;
    // ✅ Corrected relationship
    public function enrollments()
    {
        // learner_id in enrollments references id in learners
        return $this->hasMany(Enrollment::class, 'learner_id', 'id');
    }
}
