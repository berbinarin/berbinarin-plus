<?php

namespace App\Http\Controllers\Dashboard\BerbinarPlus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_User;
use App\Models\BerbinarpUserStatus;
use App\Models\Berbinarp_Class;
use App\Models\EnrollmentUser;
use App\Services\ImageService;

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
    public function store(Request $request, ImageService $imageService)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:berbinarp_users,email',
            'last_education' => 'required',
            'referral_source' => 'required',
            'course_id' => 'required|exists:berbinarp_class,id',
            'service_package' => 'required',
            'price_package' => 'required',
            'payment_proof_url' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        // Simpan user
        $user = Berbinarp_User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'last_education' => $request->last_education,
            'referral_source' => $request->referral_source,
            'user_status_id' => BerbinarpUserStatus::where('name', 'pending')->first()?->id ?? 1,
        ]);

        // Simpan bukti transfer pakai ImageService
        $buktiTransferFile = $request->file('payment_proof_url');
        $buktiTransferFilename = $imageService->upload($buktiTransferFile, 'uploads/bukti_transfer', 800, null); // width 800px, height null
        $buktiTransferPath = 'uploads/bukti_transfer/' . $buktiTransferFilename;

        // Simpan enrollments_users
        $enrollment = new EnrollmentUser();
        $enrollment->user_id = $user->id;
        $enrollment->course_id = $request->course_id;
        $enrollment->service_package = $request->service_package;
        $enrollment->price_package = $request->price_package;
        $enrollment->payment_proof_url = $buktiTransferPath;
        $enrollment->status_kelas = 'pending_payment';
        $enrollment->save();

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
    public function update(Request $request, $id, ImageService $imageService)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'last_education' => 'required',
            'referral_source' => 'required',
            'class_id' => 'required|exists:berbinarp_class,id',
            'service_package' => 'required',
            'price_package' => 'required',
        ]);

        $user = Berbinarp_User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->last_education = $request->last_education;
        $user->referral_source = $request->referral_source;
        $user->save();

        // Update enrollment 
        $enrollment = $user->enrollments->first();
        if ($enrollment) {
            $enrollment->course_id = $request->class_id;
            $enrollment->service_package = $request->service_package;
            $enrollment->price_package = $request->price_package;
            // Update payment proof
            if ($request->hasFile('payment_proof_url')) {
                $buktiTransferFile = $request->file('payment_proof_url');
                $buktiTransferFilename = $imageService->upload($buktiTransferFile, 'uploads/bukti_transfer', 800, null);
                $buktiTransferPath = 'uploads/bukti_transfer/' . $buktiTransferFilename;
                $enrollment->payment_proof_url = $buktiTransferPath;
            }
            $enrollment->save();
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
