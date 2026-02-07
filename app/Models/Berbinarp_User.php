<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Berbinarp_User extends Authenticatable
{
    use HasFactory;
    protected $table = 'berbinarp_users';
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'age',
        'phone_number',
        'email',
        'last_education',
        'username',
        'password',
        'user_status_id',
        'plain_password',
    ];

    // Relasi ke status user
    public function status(): BelongsTo
    {
        return $this->belongsTo(BerbinarpUserStatus::class, 'user_status_id');
    }

    // Relasi ke enrollments
    public function enrollments(): HasMany
    {
        return $this->hasMany(EnrollmentUser::class, 'user_id');
    }

    public function classes()
    {
        return $this->belongsToMany(Berbinarp_Class::class, 'enrollments_users', 'user_id', 'course_id');
    }

    public function certificates()
    {
        return $this->hasMany(Certificates::class, 'user_id');
    }
}
