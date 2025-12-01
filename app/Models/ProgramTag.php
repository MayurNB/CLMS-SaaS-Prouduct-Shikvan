<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramTag extends Model
{
    use HasFactory;

    protected $table = 'program_tags';
    public $incrementing = false;
    public $timestamps = true;
    protected $primaryKey = null; // pivot table, no id column
    protected $keyType = 'string';

    protected $fillable = [
        'program_id',
        'tag_id',
    ];
}
