<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course_Section;

class User_Progres extends Model
{
    use HasFactory;

    protected $table = 'user_progress';

    protected $fillable = [
        'user_id',
        'course_section_id',
        'test_id',
        'status_materi',
        'completed_at',
        'last_accessed',
    ];

    public function user()
    {
        return $this->belongsTo(Berbinarp_User::class, 'user_id');
    }

    public function courseSection()
    {
        return $this->belongsTo(Course_Section::class, 'course_section_id');
    }
    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
}
