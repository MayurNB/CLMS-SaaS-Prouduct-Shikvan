<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProgramTag extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'program_tags';

    protected $fillable = [
        'program_id',
        'tag_id',
    ];

    /**
     * Get the program that owns the program tag.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the tag that owns the program tag.
     */
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}