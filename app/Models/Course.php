<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Course extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'program_id',
        'course_name',
        'normalized_name',
        'description',
        'duration',
        'is_published',       // added
        'created_by_user_id',  // added
    ];

    /**
     * The program this course belongs to.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
