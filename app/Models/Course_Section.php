<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User_Progres;

class Course_Section extends Model
{
    use HasFactory;

    protected $table = 'course_section';

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'video_url',
        'order_key',
    ];

    public function course()
    {
        return $this->belongsTo(Berbinarp_Class::class, 'course_id');
    }

    public function userProgress()
    {
        return $this->hasMany(User_Progres::class, 'course_section_id');
    }
}
