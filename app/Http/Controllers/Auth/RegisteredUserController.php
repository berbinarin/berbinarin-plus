<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Berbinarp_Class;
use App\Models\Berbinarp_User;
use App\Models\EnrollmentUser;
use App\Models\BerbinarpUserStatus;
use Illuminate\Support\Facades\Log;


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

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'gender' => 'required|string',
                'age' => 'required|integer|min:1',
                'phone_number' => 'required|string',
                'email' => 'required|email|unique:berbinarp_users,email',
                'last_education' => 'required|string',
                'otherEducation' => 'nullable|string|max:255',
                'referral_source' => 'required|string',
                'otherReasonText' => 'nullable|string|max:255',
                'course_id' => 'required|exists:berbinarp_class,id',
                'service_package' => 'required|string',
                'price_package' => 'required|string',
                'payment_proof_url' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            $lastEducation = $request->last_education;
            if ($lastEducation === 'Other' && $request->filled('otherEducation')) {
                $lastEducation = $request->otherEducation;
            }

            $referralSource = $request->referral_source;
            if ($referralSource === 'Other' && $request->filled('otherReasonText')) {
                $referralSource = $request->otherReasonText;
            }

            // Bukti transfer
            $buktiTransferPath = $request->file('payment_proof_url')->store('uploads/bukti_transfer', 'public');

            $user = Berbinarp_User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'age' => $request->age,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'last_education' => $lastEducation,
                'referral_source' => $referralSource,
                'user_status_id' => BerbinarpUserStatus::where('name', 'pending')->first()?->id ?? 1,
            ]);

            // Simpan enrollments_users
            $enrollment = new EnrollmentUser();
            $enrollment->user_id = $user->id;
            $enrollment->course_id = $request->course_id;
            $enrollment->service_package = $request->service_package;
            $enrollment->price_package = $request->price_package;
            $enrollment->payment_proof_url = $buktiTransferPath;
            $enrollment->status_kelas = 'pending_payment';
            $enrollment->save();



            return redirect()->route('landing.index')->with([
                'alert' => true,
                'icon' => asset('assets/images/dashboard/success.webp'),
                'title' => 'Pendaftaran Berhasil',
                'message' => 'Selamat datang di Berbinar+',
                'type' => 'success',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal. Silakan periksa kembali data Anda.',
                    'errors' => $e->errors()
                ], 422);
            }
            // Tampilan eror ketika email sudah terdaftar
            if (isset($e->validator) && $e->validator->errors()->has('email')) {
                return redirect()->back()->withInput()->with('email_exists', true);
            }
            throw $e;
        } catch (\Exception $e) {
            Log::error('Registration error: ' . $e->getMessage());

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.'
                ], 500);
            }

            return redirect()->route('auth.berbinar-plus.regis')->with([
                'alert' => true,
                'icon' => asset('assets/images/dashboard/error.webp'),
                'title' => 'Pendaftaran Gagal',
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'type' => 'error',
            ]);
        }
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
    public function enrollClassStore(Request $request)
    {
        $user = auth('berbinar')->user();
        $validated = $request->validate([
            'course_id' => 'required|exists:berbinarp_class,id',
            'service_package' => 'required|string',
            'price_package' => 'required|string',
            'payment_proof_url' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'referral_source' => 'required|string',
            'otherReasonText' => 'nullable|string|max:255',
        ]);

        // Cek apakah user sudah pernah daftar kelas ini
        $alreadyEnrolled = EnrollmentUser::where('user_id', $user->id)
            ->where('course_id', $request->course_id)
            ->exists();
        if ($alreadyEnrolled) {
            return redirect()->back()->with([
                'alert' => true,
                'icon' => asset('assets/images/landing/favicion/warning.webp'),
                'title' => 'Sudah Terdaftar',
                'message' => 'Anda sudah terdaftar di kelas ini.',
                'type' => 'warning',
            ]);
        }

        $referralSource = $request->referral_source;
        if ($referralSource === 'Other' && $request->filled('otherReasonText')) {
            $referralSource = $request->otherReasonText;
        }

        // Upload bukti transfer
        $buktiTransferPath = $request->file('payment_proof_url')->store('uploads/bukti_transfer', 'public');

        // Simpan enrollments_users
        $enrollment = new EnrollmentUser();
        $enrollment->user_id = $user->id;
        $enrollment->course_id = $request->course_id;
        $enrollment->service_package = $request->service_package;
        $enrollment->price_package = $request->price_package;
        $enrollment->payment_proof_url = $buktiTransferPath;
        $enrollment->status_kelas = 'pending_payment';
        $enrollment->save();

        return redirect()->route('landing.index')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Pendaftaran Kelas Berhasil',
            'message' => 'Kamu berhasil mendaftar kelas baru. Silakan tunggu verifikasi admin.',
            'type' => 'success',
        ]);
    }
}
