<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PretestController extends Controller
{
    public function pretest($class_id)
    {
        $class = \App\Models\Berbinarp_Class::findOrFail($class_id);
        $pretest = $class->pretest;
        return view('landing.pretest.index', compact('class', 'pretest'));
    }

    public function pretestQuestion($class_id, $number)
    {
        $class = \App\Models\Berbinarp_Class::findOrFail($class_id);
        $pretest = $class->pretest;
        $questions = $pretest ? $pretest->questions : collect();
        $index = max(0, (int)$number - 1);
        $question = $questions->get($index);
        $total = $questions->count();
        return view('landing.pretest.test', compact('class', 'pretest', 'question', 'number', 'total'));
    }

    public function pretestFinished($class_id)
    {
        $class = \App\Models\Berbinarp_Class::findOrFail($class_id);
        $pretest = $class->pretest;
        return view('landing.pretest.index-finished', compact('class', 'pretest'));
    }

    public function submitPretest(Request $request, $class_id)
    {
        $user = auth('berbinar')->user();
        $class = \App\Models\Berbinarp_Class::findOrFail($class_id);
        $pretest = $class->pretest;
        if (!$pretest) {
            return redirect()->back()->with('error', 'Pretest tidak ditemukan');
        }
        $answers = $request->input('answers', []);
        // Debug: return user dan answers
        if ($request->has('debug')) {
            return response()->json([
                'user' => $user,
                'answers_raw' => $answers,
                'answers_decoded' => is_string($answers) ? json_decode($answers, true) : $answers,
            ]);
        }
        // Pastikan $answers adalah array, decode jika string JSON
        if (is_string($answers)) {
            $decoded = json_decode($answers, true);
            if (is_array($decoded)) {
                $answers = $decoded;
            }
        }
        // Simpan ke user_test_results
        $result = \App\Models\Test_Result::updateOrCreate([
            'user_id' => $user->id,
            'test_id' => $pretest->id,
        ], [
            'course_section_id' => null,
            'score' => null,
            'answers' => json_encode($answers),
            'completed_at' => now(),
        ]);

        // Update progres user (user_progress)
        $progress = \App\Models\User_Progres::updateOrCreate([
            'user_id' => $user->id,
            'test_id' => $pretest->id,
        ], [
            'course_section_id' => null,
            'status_materi' => 'done',
            'completed_at' => now(),
            'last_accessed' => now(),
        ]);

        return redirect()->route('landing.pretest.index-finished', ['class_id' => $class_id]);
    }
}
