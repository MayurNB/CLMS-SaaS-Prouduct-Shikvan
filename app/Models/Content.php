<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Content extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'course_id',
        'title',
        'content_type',
        'content_url',
        'order_index',
    ];

    /**
     * Get the course that owns the content.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}