<?php

namespace App\Http\Controllers\Dashboard\BerbinarPlus\Tests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user, $enrollment)
    {
        $userModel = \App\Models\Berbinarp_User::findOrFail($user);
        $enrollmentModel = \App\Models\EnrollmentUser::findOrFail($enrollment);
        $course = $enrollmentModel->course;
        $preTest = $course && $course->tests ? $course->tests->where('type', 'pre_test')->first() : null;
        $postTest = $course && $course->tests ? $course->tests->where('type', 'post_test')->first() : null;
        $preTestResult = $preTest && $preTest->userProgresses ? $preTest->userProgresses->where('user_id', $userModel->id)->first() : null;
        $postTestResult = $postTest && $postTest->userProgresses ? $postTest->userProgresses->where('user_id', $userModel->id)->first() : null;
        $certificate = \App\Models\Certificates::where('user_id', $userModel->id)->where('course_id', $course ? $course->id : null)->first();
        return view('dashboard.berbinar-plus.pengumpulan.index', compact(
            'userModel',
            'enrollmentModel',
            'preTest',
            'postTest',
            'preTestResult',
            'postTestResult',
            'certificate'
        ));
    }

    public function uploadCertificate(Request $request, $user, $enrollment)
    {
        $request->validate([
            'certificate' => 'required|mimes:pdf|max:2048',
        ]);
        $userModel = \App\Models\Berbinarp_User::findOrFail($user);
        $enrollmentModel = \App\Models\EnrollmentUser::findOrFail($enrollment);
        $course = $enrollmentModel->course;
        $file = $request->file('certificate');
        $filename = 'certificate_' . $userModel->id . '_' . $course->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('certificates', $filename, 'public');
        $certificate = \App\Models\Certificates::updateOrCreate(
            [
                'user_id' => $userModel->id,
                'course_id' => $course->id,
            ],
            [
                'certificate_file' => $path,
            ]
        );
        return redirect()->back()->with('success', 'Sertifikat berhasil diupload.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
