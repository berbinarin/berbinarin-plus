<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Berbinarp_Class extends Model
{
    use HasFactory;
    protected $table = 'berbinarp_class';

    protected $fillable = [
        'category',
        'name',
        'instructor_name',
        'instructor_title',
        'rating',
        'thumbnail',
    ];

    // Relasi ke enrollments
    public function enrollments(): HasMany
    {
        return $this->hasMany(EnrollmentUser::class, 'course_id');
    }
}
