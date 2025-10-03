<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobBatch extends Model
{
    use HasFactory;

    // The 'job_batches' table uses a string primary key.
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
}