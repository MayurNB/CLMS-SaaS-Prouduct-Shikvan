<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Program extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'program_name',
        'normalized_name',
        'description',
        'start_date',
        'end_date',
        'is_active',
        'is_online',
         'created_by_user_id', // MUST be here
    ];

    /**
     * Get the courses for the program.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    

    /**
     * Get the tags for the program.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'program_tags', 'program_id', 'tag_id');
    }

    /**
     * Get the prices for the program.
     */
    public function prices()
    {
        return $this->hasMany(ProgramPrice::class);
    }

    /**
     * Get the fees for the program.
     */
    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
}