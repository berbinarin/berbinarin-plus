<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_Result extends Model
{
    use HasFactory;

    protected $table = 'user_test_results';

    protected $fillable = [
        'user_id',
        'test_id',
        'score',
        'answers',
        'completed_at',
    ];

    public function user()
    {
        return $this->belongsTo(Berbinarp_User::class, 'user_id');
    }

    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
}
