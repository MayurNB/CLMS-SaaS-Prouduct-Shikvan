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
        'course_name',
        'normalized_name',
        'description',
        'thumbnail_url',
        'price',
        'is_published',
        'program_id',
        'instructor_user_id',
        'institute_id',
    ];

    /**
     * The program this course belongs to.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * The instructor user who teaches this course.
     */
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_user_id');
    }

    /**
     * The institute info that owns this course.
     */
    public function institute()
    {
        return $this->belongsTo(InstituteInfo::class, 'institute_id');
    }

    /**
     * Get the discount offers associated with this course.
     */
    public function discountOffers()
    {
        return $this->hasMany(DiscountOffer::class, 'course_id');
    }
}
