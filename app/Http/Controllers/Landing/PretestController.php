<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_Class;
use App\Models\User_Progres;
use App\Models\Test_Result;

class PretestController extends Controller
{
    public function pretest($class_id)
    {
        $class = Berbinarp_Class::with(['sections' => function ($q) {
            $q->orderBy('order_key');
        }, 'pretest'])->findOrFail($class_id);
        $pretest = $class->pretest;
        $pretestCompleted = false;
        $sectionProgress = [];
        $canAccess = [];
        $hasCertificate = false;
        $posttestCompleted = false;
        if ($pretest && auth('berbinar')->check()) {
            $userId = auth('berbinar')->id();
            $pretestCompleted = User_Progres::where('user_id', $userId)
                ->where('test_id', $pretest->id)
                ->where('status_materi', 'completed')
                ->exists();

            // Logic unlock materi
            $sections = $class->sections;
            foreach ($sections as $i => $sec) {
                $progress = User_Progres::where('user_id', $userId)
                    ->where('course_section_id', $sec->id)
                    ->where('status_materi', 'completed')
                    ->first();
                $sectionProgress[$sec->id] = $progress ? true : false;
            }
            $prevCompleted = $pretestCompleted;
            foreach ($sections as $i => $sec) {
                if ($sectionProgress[$sec->id]) {
                    $canAccess[$sec->id] = true;
                    $prevCompleted = true;
                } else {
                    $canAccess[$sec->id] = $prevCompleted;
                    $prevCompleted = false;
                }
            }

            // Cek sertifikat 
            $certificate = \App\Models\Certificates::where('course_id', $class->id)
                ->where('user_id', $userId)
                ->first();
            $hasCertificate = $certificate && $certificate->certificate_file && file_exists(public_path('storage/' . $certificate->certificate_file));

            // Cek posttestCompleted
            $posttest = $class->posttest;
            if ($posttest) {
                $posttestCompleted = User_Progres::where('user_id', $userId)
                    ->where('test_id', $posttest->id)
                    ->where('status_materi', 'completed')
                    ->exists();
            }
        }
        return view('landing.pretest.index', compact('class', 'pretest', 'pretestCompleted', 'sectionProgress', 'canAccess', 'hasCertificate', 'posttestCompleted'));
    }

    public function pretestQuestion($class_id, $number)
    {
        $class = Berbinarp_Class::findOrFail($class_id);
        $pretest = $class->pretest;
        $questions = $pretest ? $pretest->questions : collect();
        $index = max(0, (int)$number - 1);
        $question = $questions->get($index);
        $total = $questions->count();
        return view('landing.pretest.test', compact('class', 'pretest', 'question', 'number', 'total'));
    }

    public function submitPretest(Request $request, $class_id)
    {
        $user = auth('berbinar')->user();
        $class = Berbinarp_Class::findOrFail($class_id);
        $pretest = $class->pretest;
        if (!$pretest) {
            return redirect()->back()->with('error', 'Pretest tidak ditemukan');
        }
        $answers = $request->input('answers', []);

        // Pastikan $answers adalah array, decode jika string JSON
        if (is_string($answers)) {
            $decoded = json_decode($answers, true);
            if (is_array($decoded)) {
                $answers = $decoded;
            }
        }
        // Simpan ke user_test_results
        $result = Test_Result::updateOrCreate([
            'user_id' => $user->id,
            'test_id' => $pretest->id,
        ], [
            'score' => null,
            'answers' => json_encode($answers),
            'completed_at' => now(),
        ]);

        // Update progres user 
        $progress = User_Progres::updateOrCreate([
            'user_id' => $user->id,
            'test_id' => $pretest->id,
        ], [
            'course_section_id' => null,
            'status_materi' => 'completed',
            'completed_at' => now(),
            'last_accessed' => now(),
        ]);

        // Hapus session pretest
        $request->session()->forget('pretest');
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'redirect' => route('landing.pretest.index-finished', ['class_id' => $class_id])
            ]);
        }
        return redirect()->route('landing.pretest.index-finished', ['class_id' => $class_id]);
    }
}
