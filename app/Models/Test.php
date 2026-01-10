<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';

    protected $fillable = [
        'course_id',
        'type',
        'title',
    ];

    public function course()
    {
        return $this->belongsTo(Berbinarp_Class::class, 'course_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'test_id');
    }
    
    public function userProgresses()
    {
        return $this->hasMany(User_Progres::class, 'test_id');
    }
}
