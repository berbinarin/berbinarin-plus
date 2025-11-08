<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnrollmentUser extends Model
{
    use HasFactory;
    protected $table = 'enrollments_users';
    protected $fillable = [
        'user_id',
        'course_id',
        'service_package_id',
        'payment_proof_url',
        'price_at_enrollment',
        'enrollment_status_id',
        'verified_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Berbinarp_User::class, 'user_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Berbinarp_Class::class, 'course_id');
    }

    public function servicePackage(): BelongsTo
    {
        return $this->belongsTo(Berbinarp_Service::class, 'service_package_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(BerbinarpUserStatus::class, 'enrollment_status_id');
    }
}