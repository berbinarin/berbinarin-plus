<?php

namespace App\Http\Controllers\Dashboard\BerbinarPlus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_User;
use App\Models\BerbinarpUserStatus;
use App\Models\Berbinarp_Class;
use App\Models\EnrollmentUser;

class RegistranController extends Controller
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
    public function store(Request $request)
    {
        // Validasi user
        $validated = $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'phone_number' => 'required',
                'email' => 'required|email|unique:berbinarp_users,email',
                'last_education' => 'required',
                'referral_source' => 'required',
                'user_status_id' => 'nullable',
            ],
            [
                'email.unique' => 'Email sudah terdaftar.',
            ]
        );

        // Validasi enrollments
        $request->validate([
            'class_id' => 'required|exists:berbinarp_class,id',
            'service_package' => 'required',
            'price_package' => 'required',
            'payment_proof_url' => 'required|file|mimes:jpg,jpeg,png,pdf|max:1024',
        ]);

        $user = Berbinarp_User::create(array_merge($validated, [
            'user_status_id' => 1
        ]));

        // bukti pembayaran
        $paymentProofPath = null;
        if ($request->hasFile('payment_proof_url')) {
            $file = $request->file('payment_proof_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $paymentProofPath = $file->storeAs('uploads/payment_proofs', $filename, 'public');
        }

        // enrollments_users
        EnrollmentUser::create([
            'user_id' => $user->id,
            'course_id' => $request->class_id,
            'service_package' => $request->service_package,
            'price_package' => $request->price_package,
            'payment_proof_url' => $paymentProofPath,
            'enrollment_status_id' => 1, // status default proses
        ]);

        return redirect()->route('dashboard.pendaftar.index')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.png'),
            'title' => 'Berhasil!',
            'message' => 'Pendaftar berhasil ditambahkan.',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $user = Berbinarp_User::with(['status', 'enrollments.course', 'enrollments.status'])->findOrFail($id);

    //     return view('dashboard.berbinar-plus.registran.show', compact('user'));
    // }

    public function show()
    {
        return view('dashboard.berbinar-plus.registran.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $user = Berbinarp_User::with(['enrollments'])->findOrFail($id);
    //     $statuses = BerbinarpUserStatus::all();
    //     $classes = Berbinarp_Class::all();
    //     return view('dashboard.berbinar-plus.registran.edit', compact('user', 'statuses', 'classes'));
    // }

    public function edit()
    {
        return view('dashboard.berbinar-plus.registran.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Berbinarp_User::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|max:255|unique:berbinarp_users,email,' . $user->id,
            'last_education' => 'required',
            'referral_source' => 'required',
            'username' => 'required|unique:berbinarp_users,username,' . $user->id,
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        } else {
            unset($validated['password']);
        }
        $user->update($validated);

        // Update enrollment
        if ($user->enrollments && $user->enrollments->count()) {
            foreach ($user->enrollments as $enrollment) {
                $enrollment->update([
                    'service_package' => $request->service_package,
                    'price_package' => $request->price_package,

                ]);
            }
        }

        return redirect()->route('dashboard.pendaftar.index')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.png'),
            'title' => 'Berhasil!',
            'message' => 'Pendaftar berhasil diubah.',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $user = Berbinarp_User::findOrFail($id);
    //     $user->delete();
    //     return redirect()->route('dashboard.pendaftar.index')->with([
    //         'alert' => true,
    //         'icon' => asset('assets/images/dashboard/success.png'),
    //         'title' => 'Berhasil!',
    //         'message' => 'Pendaftar berhasil dihapus.',
    //         'type' => 'success',
    //     ]);;
    // }

    public function destroy()
    {
        return redirect()->route('dashboard.pendaftar.index')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.png'),
            'title' => 'Berhasil!',
            'message' => 'Pendaftar berhasil dihapus.',
            'type' => 'success',
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'enrollment_status_id' => 'required|in:1,2',
        ]);

        $enrollment = EnrollmentUser::findOrFail($id);
        $user = $enrollment->user;

        // Jika status diubah ke "terdaftar" dan username/password belum ada, generate
        if ($request->enrollment_status_id == 2) {
            if (empty($user->username)) {
                $user->username = strtolower($user->first_name) . rand(100, 999);
            }
            if (empty($user->password)) {
                // Generate password acak 8 karakter (huruf besar, kecil, angka)
                $plainPassword = $this->generateRandomPassword(8);
                $user->password = bcrypt($plainPassword);
                $user->plain_password = $plainPassword;
                session(['generated_credentials' => [
                    'username' => $user->username,
                    'password' => $plainPassword,
                ]]);
            }
            $user->save();
        }

        $enrollment->enrollment_status_id = $request->enrollment_status_id;
        $enrollment->save();

        return back()->with('success', 'Status Terdaftar.');
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
}
