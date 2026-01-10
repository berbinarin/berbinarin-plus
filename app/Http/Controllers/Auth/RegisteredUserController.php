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

            // Handle "Other" option for last_education
            $lastEducation = $request->last_education;
            if ($lastEducation === 'Other' && $request->filled('otherEducation')) {
                $lastEducation = $request->otherEducation;
            }

            // Handle "Other" option for referral_source
            $referralSource = $request->referral_source;
            if ($referralSource === 'Other' && $request->filled('otherReasonText')) {
                $referralSource = $request->otherReasonText;
            }

            // Simpan bukti transfer
            $buktiTransferPath = $request->file('payment_proof_url')->store('uploads/bukti_transfer', 'public');

            // Simpan user
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



            return redirect()->route('home.index')->with([
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
            // Jika error karena email sudah terdaftar, redirect dengan session untuk swall
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

            return redirect()->route('auth.berbinar-plus.login')->with([
                'alert' => true,
                'icon' => asset('assets/images/dashboard/error.webp'),
                'title' => 'Pendaftaran Gagal',
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'type' => 'error',
            ]);
        }
    }
}
