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
        'description',
    ];

    // Relasi ke enrollments
    public function enrollments(): HasMany
    {
        return $this->hasMany(EnrollmentUser::class, 'course_id');
    }

    // Relasi ke course sections (materi)
    public function sections(): HasMany
    {
        return $this->hasMany(Course_Section::class, 'course_id');
    }

    // Relasi ke tests (pre-test & post-test)
    public function tests(): HasMany
    {
        return $this->hasMany(Test::class, 'course_id');
    }

    public function pretest()
    {
        return $this->hasOne(Test::class, 'course_id')->where('type', 'pre_test');
    }

    public function posttest()
    {
        return $this->hasOne(Test::class, 'course_id')->where('type', 'post_test');
    }

    public function users()
    {
        return $this->belongsToMany(Berbinarp_User::class, 'enrollments_users', 'course_id', 'user_id');
    }
}
