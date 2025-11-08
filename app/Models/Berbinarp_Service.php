<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berbinarp_Service extends Model
{
    use HasFactory;

    protected $table = 'berbinarp_services';

    protected $fillable = [
        'name',
        'type',
        'schedule',
        'description',
        'price',
        'price_note',
    ];
}
