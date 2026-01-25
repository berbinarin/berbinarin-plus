<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    use HasFactory;

    protected $table = 'certificates';

    protected $fillable = [
        'user_id',
        'course_id',
        'certificate_file',
    ];

    public function user()
    {
        return $this->belongsTo(Berbinarp_User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Berbinarp_Class::class, 'course_id');
    }
}
