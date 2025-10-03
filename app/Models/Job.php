<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // The 'jobs' table uses a standard auto-incrementing integer primary key
    // so we don't need to explicitly define a UUID primary key.
}