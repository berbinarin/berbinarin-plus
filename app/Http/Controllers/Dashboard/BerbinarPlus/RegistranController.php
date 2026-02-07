<?php

namespace App\Http\Controllers\Dashboard\BerbinarPlus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_User;
use App\Models\BerbinarpUserStatus;
use App\Models\Berbinarp_Class;
use App\Models\EnrollmentUser;
use App\Services\Auth\RegistrationService;
use App\Services\Media\ImageService;

class RegistranController extends Controller

/**
 * Update user status to active and generate username/password if needed.
 */
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftar = Berbinarp_User::with(['status', 'enrollments.course'])->get();
        $progress = "posttest";
        return view('dashboard.berbinar-plus.registran.index', compact('pendaftar', 'progress'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = BerbinarpUserStatus::all();
        $classes = Berbinarp_Class::all();
        return view('dashboard.berbinar-plus.registran.create', compact('statuses', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, RegistrationService $registrationService)
    {
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

        return redirect()->route('dashboard.pendaftar.index')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil',
            'message' => 'Pendaftar Berhasil Ditambahkan',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified user resource.
     */
    public function show($id)
    {
        $user = Berbinarp_User::with(['enrollments.course', 'status'])->findOrFail($id);
        return view('dashboard.berbinar-plus.registran.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = Berbinarp_User::with(['enrollments'])->findOrFail($id);
        $statuses = BerbinarpUserStatus::all();
        $classes = Berbinarp_Class::all();
        return view('dashboard.berbinar-plus.registran.edit', compact('user', 'statuses', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified user and enrollment in storage.
     */
    public function update(Request $request, $id, RegistrationService $registrationService)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'last_education' => 'required|string|max:255',
            'otherEducation' => 'required_if:last_education,Other|string|max:255',
            'referral_source' => 'required|string|max:255',
            'otherReasonText' => 'required_if:referral_source,Other|string|max:255',
            'course_id' => 'required|exists:berbinarp_class,id',
            'service_package' => 'required|string|max:255',
            'price_package' => 'required|string|max:255',
            'payment_proof_url' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $user = Berbinarp_User::findOrFail($id);
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->gender = $validated['gender'];
        $user->age = $validated['age'];
        $user->phone_number = $validated['phone_number'];
        $user->email = $validated['email'];
        $user->username = $request->username;
        $user->last_education = $validated['last_education'];
        $user->save();

        // Update enrollment (hanya satu enrollment pertama) pakai service
        $enrollment = $user->enrollments->first();
        if ($enrollment) {
            $enrollmentData = [
                'course_id' => $validated['course_id'],
                'service_package' => $validated['service_package'],
                'price_package' => $validated['price_package'],
                'referral_source' => $validated['referral_source'],
                'otherReasonText' => $validated['otherReasonText'] ?? null,
            ];
            $paymentProofFile = $request->hasFile('payment_proof_url') ? $request->file('payment_proof_url') : null;
            // Gunakan service untuk update enrollment
            $this->updateEnrollment($enrollment, $enrollmentData, $paymentProofFile);
        }

        return redirect()->route('dashboard.pendaftar.index')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil',
            'message' => 'Pendaftar Berhasil Diubah',
            'type' => 'success',
        ]);
    }

    /**
     * Update enrollment data using service logic
     */
    private function updateEnrollment($enrollment, array $data, $paymentProofFile = null)
    {
        $enrollment->course_id = $data['course_id'];
        $enrollment->service_package = $data['service_package'];
        $enrollment->price_package = $data['price_package'];
        // Update referral_source logic (handle 'Other')
        $referralSource = $data['referral_source'];
        if ($referralSource === 'Other' && !empty($data['otherReasonText'])) {
            $referralSource = $data['otherReasonText'];
        }
        $enrollment->referral_source = $referralSource;
        // Update payment proof if file provided
        if ($paymentProofFile) {
            $buktiTransferFilename = app(ImageService::class)->upload($paymentProofFile, 'uploads/bukti_transfer', 800, null);
            $buktiTransferPath = 'uploads/bukti_transfer/' . $buktiTransferFilename;
            $enrollment->payment_proof_url = $buktiTransferPath;
        }
        $enrollment->save();
    }


    /**
     * Remove the specified user and related enrollments from storage.
     */
    public function destroy($id)
    {
        $user = Berbinarp_User::findOrFail($id);
        // Delete enrollments
        $user->enrollments()->delete();
        // Delete user
        $user->delete();
        return redirect()->route('dashboard.pendaftar.index')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil!',
            'message' => 'Pendaftar berhasil dihapus.',
            'type' => 'success',
        ]);
    }

    public function updateUserStatus(Request $request, $id)
    {
        $request->validate([
            'user_status_id' => 'required|in:2',
        ]);

        $user = Berbinarp_User::findOrFail($id);
        $user->user_status_id = $request->user_status_id;

        // Generate username and password 
        if (empty($user->username)) {
            $user->username = strtolower($user->first_name) . rand(100, 999);
        }
        if (empty($user->password)) {
            $plainPassword = $this->generateRandomPassword(8);
            $user->password = bcrypt($plainPassword);
            $user->plain_password = $plainPassword;
            session(['generated_credentials' => [
                'username' => $user->username,
                'password' => $plainPassword,
            ]]);
        }
        $user->save();

        return back()->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil',
            'message' => 'Status User Berhasil Diubah Menjadi Aktif',
            'type' => 'success',
        ]);
    }

    /**
     * Generate random password.
     */
    private function generateRandomPassword($length = 8)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[random_int(0, strlen($chars) - 1)];
        }
        return $password;
    }

    /**
     * ACC pembayaran: ubah status_kelas menjadi 'enrolled' untuk enrollment tertentu
     */
    public function accPembayaran($enrollment_id)
    {
        $enrollment = EnrollmentUser::findOrFail($enrollment_id);
        $enrollment->status_kelas = 'enrolled';
        $enrollment->verified_at = now();
        $enrollment->save();
        return back()->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil',
            'message' => 'Status Kelas Berhasil Diubah Menjadi Terdaftar',
            'type' => 'success',
        ]);
    }
}
