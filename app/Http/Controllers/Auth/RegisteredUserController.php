<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Berbinarp_Class;
use App\Models\Berbinarp_User;
use App\Models\EnrollmentUser;


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
        // dd($request->all());

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required|integer',
            'phone_number' => 'required',
            'email' => 'required|email|unique:berbinarp_users,email',
            'last_education' => 'required',
            'course_id' => 'required|exists:berbinarp_class,id',
            'service_package' => 'required',
            'price_package' => 'required',
            'payment_proof_url' => 'required|image|max:2048',
            'referral_source' => 'required',
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
            'user_status_id' => 1,
        ]);

        $paymentProofPath = null;
        if ($request->hasFile('payment_proof_url')) {
            $file = $request->file('payment_proof_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $paymentProofPath = $file->storeAs('uploads/payment_proofs', $filename, 'public');
        }

        EnrollmentUser::create([
            'user_id' => $user->id,
            'course_id' => $request->course_id,
            'service_package' => $request->service_package,
            'price_package' => $request->price_package,
            'payment_proof_url' => $paymentProofPath,
            'enrollment_status_id' => 1,
        ]);

        return redirect()->route('home.index')->with('success', 'Pendaftaran berhasil!');
    }
}
