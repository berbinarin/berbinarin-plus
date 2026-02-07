<?php

namespace App\Services\Auth;

use App\Models\Berbinarp_User;
use App\Models\BerbinarpUserStatus;
use App\Models\EnrollmentUser;
use App\Services\Media\ImageService;
use Illuminate\Support\Facades\DB;

class RegistrationService
{
    /**
     * RegistrationService digunakan untuk mengelola logika pendaftaran pengguna
     * @var ImageService 
     */

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Function ini menangani pendaftaran user baru sekaligus enrollment kelas pertama.
     */
    public function registerUserWithEnrollment(array $data, $paymentProofFile)
    {
        return DB::transaction(function () use ($data, $paymentProofFile) {

            // 1 Olah kolom "Other" untuk pendidikan
            $lastEducation = ($data['last_education'] === 'Lainnya') ? ($data['otherEducation'] ?? $data['last_education']) : $data['last_education'];

            // 2 Upload bukti pembayaran
            $buktiFilename = $this->imageService->upload($paymentProofFile, 'bukti_transfer', 800, null);
            $buktiPath = 'bukti_transfer/' . $buktiFilename;

            // 3 Simpan data user
            $user = Berbinarp_User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'age' => $data['age'],
                'phone_number' => $data['phone_number'],
                'email' => $data['email'],
                'last_education' => $lastEducation,
                'user_status_id' => BerbinarpUserStatus::where('name', 'pending')->first()?->id ?? 1,
            ]);

            $this->createEnrollment($user->id, $data, $buktiPath);

            return $user;
        });
    }

    /**
     * Menangani pendaftaran kelas tambahan untuk user yang sudah login.
     */
    public function enrollExistingUser($userId, array $data, $paymentProofFile)
    {
        return DB::transaction(function () use ($userId, $data, $paymentProofFile) {
            // Upload bukti bayar
            $buktiFilename = $this->imageService->upload($paymentProofFile, 'uploads/bukti_transfer', 800);
            $buktiPath = 'uploads/bukti_transfer/' . $buktiFilename;

            return $this->createEnrollment($userId, $data, $buktiPath);
        });
    }

    private function createEnrollment($userId, array $data, $buktiPath)
    {
        // Olah referral_source jika "Other"
        $referralSource = $data['referral_source'] ?? null;
        if (($referralSource === 'Other') && !empty($data['otherReasonText'])) {
            $referralSource = $data['otherReasonText'];
        }
        return EnrollmentUser::create([
            'user_id' => $userId,
            'course_id' => $data['course_id'],
            'service_package' => $data['service_package'],
            'price_package' => $data['price_package'],
            'payment_proof_url' => $buktiPath,
            'referral_source' => $referralSource,
            'status_kelas' => 'pending_payment',
        ]);
    }
}
