<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BerbinarpUserStatus extends Model
{
    use HasFactory;
    protected $table = 'berbinarp_users_status';
    protected $fillable = ['name'];

    // Relasi ke users
    public function users(): HasMany
    {
        return $this->hasMany(Berbinarp_User::class, 'user_status_id');
    }

}
