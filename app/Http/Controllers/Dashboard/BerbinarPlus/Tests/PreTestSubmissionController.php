<?php

namespace App\Http\Controllers\Dashboard\BerbinarPlus\Tests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_User;;
use App\Models\EnrollmentUser;
use App\Models\Test_Result;

class PreTestSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = $request->query('user');
        $enrollmentId = $request->query('enrollment');
        $userModel = null;
        $enrollmentModel = null;
        if ($userId && $enrollmentId) {
            $userModel = Berbinarp_User::find($userId);
            $enrollmentModel = EnrollmentUser::find($enrollmentId);
        }
        return view('dashboard.berbinar-plus.pengumpulan.pretest.index', compact('userModel', 'enrollmentModel'));
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
    // public function show(string $id)
    public function show(Request $request)
    {
        $userId = $request->query('user');
        $enrollmentId = $request->query('enrollment');
        $userModel = null;
        $enrollmentModel = null;
        $benar = 0;
        $salah = 0;
        $tanggalPengerjaan = null;
        $status = null;
        $jawabanList = [];
        if ($userId && $enrollmentId) {
            $userModel = Berbinarp_User::find($userId);
            $enrollmentModel = EnrollmentUser::find($enrollmentId);
            $course = $enrollmentModel ? $enrollmentModel->course : null;
            $preTest = $course && $course->tests ? $course->tests->where('type', 'pre_test')->first() : null;
            if ($preTest) {
                $testResult = Test_Result::where('user_id', $userId)->where('test_id', $preTest->id)->first();
                if ($testResult) {
                    $status = 'Finished';
                    $tanggalPengerjaan = $testResult->completed_at ? date('d M Y', strtotime($testResult->completed_at)) : '-';
                    $answers = json_decode($testResult->answers, true);
                    $questions = $preTest->questions;
                    foreach ($questions as $q) {
                        $jawabanUser = null;
                        if (isset($answers[$q->id])) {
                            // Output handling jika jawaban berupa array atau string
                            if (is_array($answers[$q->id]) && isset($answers[$q->id]['answer'])) {
                                $jawabanUser = $answers[$q->id]['answer'];
                            } else {
                                $jawabanUser = $answers[$q->id];
                            }
                        }
                        $jawabanBenar = $q->correct_answer;
                        $jawabanList[] = [
                            'pertanyaan' => $q->question_text,
                            'jawaban' => $jawabanUser,
                            'jawaban_benar' => $jawabanBenar,
                        ];
                        if ($jawabanUser == $jawabanBenar) {
                            $benar++;
                        } else {
                            $salah++;
                        }
                    }
                } else {
                    $status = 'Progress';
                }
            }
        }
        return view('dashboard.berbinar-plus.pengumpulan.pretest.show', compact('userModel', 'enrollmentModel', 'benar', 'salah', 'tanggalPengerjaan', 'status', 'jawabanList'));
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
