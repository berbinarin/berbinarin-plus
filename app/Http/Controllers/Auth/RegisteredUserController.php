<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Berbinarp_Class;
use App\Models\Berbinarp_User;
use App\Models\EnrollmentUser;
use App\Models\BerbinarpUserStatus;

use Illuminate\Support\Facades\Log;
use App\Services\Auth\RegistrationService;


class RegisteredUserController
{
    public function berbinarPlusRegister()
    {
        $servicePackages = [
            [
                'value' => 'Insight',
                'label' => 'Insight',
                'harga' => '15000',
            ],
            [
                'value' => 'A+ Online Weekday',
                'label' => 'A+ Online Weekday',
                'harga' => '36000-120000',
            ],
            [
                'value' => 'A+ Online Weekend',
                'label' => 'A+ Online Weekend',
                'harga' => '44000-140000',
            ],
            [
                'value' => 'A+ Offline Weekday',
                'label' => 'A+ Offline Weekday',
                'harga' => '44000-140000',
            ],
            [
                'value' => 'A+ Offline Weekend',
                'label' => 'A+ Offline Weekend',
                'harga' => '44000-180000',
            ],
            [
                'value' => 'Complete',
                'label' => 'Complete',
                'harga' => '100000-280000',
            ],
        ];

        $ClassBerbinarPlus = Berbinarp_Class::pluck('name', 'id');
        return view('auth.register.register', compact('servicePackages', 'ClassBerbinarPlus'));
    }

    public function store(Request $request, RegistrationService $registrationService)
    {
        // Cek email sudah terdaftar
        if (Berbinarp_User::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput()->with([
                'alert' => true,
                'icon' => asset('assets/images/landing/favicion/warning.webp'),
                'title' => 'Email Sudah Terdaftar',
                'message' => 'Email yang Anda masukkan sudah terdaftar. Silakan gunakan email lain.',
                'type' => 'warning',
            ]);
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'last_education' => 'required|string|max:255',
            'otherEducation' => 'nullable|string|max:255',
            'referral_source' => 'required|string|max:255',
            'otherReasonText' => 'nullable|string|max:255',
            'course_id' => 'required|exists:berbinarp_class,id',
            'service_package' => 'required|string|max:255',
            'price_package' => 'required|string|max:255',
            'payment_proof_url' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $registrationService->registerUserWithEnrollment($validated, $request->file('payment_proof_url'));

        return redirect()->route('auth.berbinar-plus.success');
    }


    public function registerClass(Request $request)
    {
        $user = auth('berbinar')->user();
        // Ambil semua kelas yang belum diambil user
        $enrolledCourseIds = $user->enrollments->pluck('course_id')->toArray();
        $courses = Berbinarp_Class::whereNotIn('id', $enrolledCourseIds)->get();

        // Paket layanan
        $packages = [
            (object)['id' => 'Insight', 'name' => 'Insight', 'price' => '15000'],
            (object)['id' => 'A+ Online Weekday', 'name' => 'A+ Online Weekday', 'price' => '36000-120000'],
            (object)['id' => 'A+ Online Weekend', 'name' => 'A+ Online Weekend', 'price' => '44000-140000'],
            (object)['id' => 'A+ Offline Weekday', 'name' => 'A+ Offline Weekday', 'price' => '44000-140000'],
            (object)['id' => 'A+ Offline Weekend', 'name' => 'A+ Offline Weekend', 'price' => '44000-180000'],
            (object)['id' => 'Complete', 'name' => 'Complete', 'price' => '100000-280000'],
        ];

        return view('auth.register.register-class', compact('courses', 'packages'));
    }

    // Proses pendaftaran kelas baru untuk user yang sudah terdaftar
    public function enrollClassStore(Request $request, RegistrationService $registrationService)
    {
        $user = auth('berbinar')->user();
        $validated = $request->validate([
            'course_id' => 'required|exists:berbinarp_class,id',
            'service_package' => 'required|string',
            'price_package' => 'required|string',
            'payment_proof_url' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'referral_source' => 'required|string',
            'otherReasonText' => 'nullable|string|max:255',
        ]);


        $registrationService->enrollExistingUser($user->id, $validated, $request->file('payment_proof_url'));

        return redirect()->route('auth.berbinar-plus.success');
    }

    public function success()
    {
        return view('auth.register.success');
    }
}
