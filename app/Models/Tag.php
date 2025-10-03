<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Tag extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'tag_name',
    ];

    /**
     * The programs that have this tag.
     */
    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_tags', 'tag_id', 'program_id');
    }
}