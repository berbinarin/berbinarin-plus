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

    public function enrollments(): HasMany
    {
        // Foreign key di enrollments_users: enrollment_status_id
        return $this->hasMany(EnrollmentUser::class, 'enrollment_status_id');
    }
}