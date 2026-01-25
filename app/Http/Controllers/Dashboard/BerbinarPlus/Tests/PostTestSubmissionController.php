<?php

namespace App\Http\Controllers\Dashboard\BerbinarPlus\Tests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostTestSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.berbinar-plus.pengumpulan.posttest.index');
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
            $userModel = \App\Models\Berbinarp_User::find($userId);
            // Pastikan properti name selalu terisi fallback ke first_name/last_name jika kosong
            if ($userModel) {
                $name = trim(($userModel->first_name ?? '') . ' ' . ($userModel->last_name ?? ''));
                $userModel->name = $name !== '' ? $name : null;
            }
            $enrollmentModel = \App\Models\EnrollmentUser::find($enrollmentId);
            $course = $enrollmentModel ? $enrollmentModel->course : null;
            $postTest = $course && $course->tests ? $course->tests->where('type', 'post_test')->first() : null;
            if ($postTest) {
                $testResult = \App\Models\Test_Result::where('user_id', $userId)->where('test_id', $postTest->id)->first();
                if ($testResult) {
                    $status = 'Finished';
                    $tanggalPengerjaan = $testResult->completed_at ? date('d M Y', strtotime($testResult->completed_at)) : '-';
                    $answers = json_decode($testResult->answers, true);
                    $questions = $postTest->questions;
                    foreach ($questions as $q) {
                        $jawabanUser = null;
                        if (isset($answers[$q->id])) {
                            // handle both array and string answer format
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
        return view('dashboard.berbinar-plus.pengumpulan.posttest.show', compact('userModel', 'enrollmentModel', 'benar', 'salah', 'tanggalPengerjaan', 'status', 'jawabanList'));
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
