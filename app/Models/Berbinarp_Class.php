<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berbinarp_Class extends Model
{
    use HasFactory;
    protected $table = 'berbinarp_class';
    protected $fillable = ['name','description','syllabus','thumbnail'];
    
}
