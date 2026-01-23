<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_Class;
use App\Models\User_Progres;
use App\Models\Test_Result;

class PosttestController extends Controller
{
    public function posttest($class_id)
    {
        if ($class_id) {
            $class = Berbinarp_Class::with(['sections' => function ($q) {
                $q->orderBy('order_key');
            }, 'posttest'])->findOrFail($class_id);
        } else {
            $class = Berbinarp_Class::whereHas('posttest')->with(['sections' => function ($q) {
                $q->orderBy('order_key');
            }, 'posttest'])->firstOrFail();
        }
        $posttest = $class->posttest;
        $posttestCompleted = false;
        $sectionProgress = [];
        $canAccess = [];
        if ($posttest && auth('berbinar')->check()) {
            $userId = auth('berbinar')->id();
            $posttestCompleted = User_Progres::where('user_id', $userId)
                ->where('test_id', $posttest->id)
                ->where('status_materi', 'completed')
                ->exists();

            $sections = $class->sections;
            foreach ($sections as $i => $sec) {
                $progress = User_Progres::where('user_id', $userId)
                    ->where('course_section_id', $sec->id)
                    ->where('status_materi', 'completed')
                    ->first();
                $sectionProgress[$sec->id] = $progress ? true : false;
            }
            $prevCompleted = $posttestCompleted;
            foreach ($sections as $i => $sec) {
                if ($sectionProgress[$sec->id]) {
                    $canAccess[$sec->id] = true;
                    $prevCompleted = true;
                } else {
                    $canAccess[$sec->id] = $prevCompleted;
                    $prevCompleted = false;
                }
            }
        }
        return view('landing.posttest.index', compact('class', 'posttest', 'posttestCompleted', 'sectionProgress', 'canAccess'));
    }

    public function posttestQuestion($class_id, $number)
    {
        $class = Berbinarp_Class::findOrFail($class_id);
        $posttest = $class->posttest;
        $questions = $posttest ? $posttest->questions : collect();
        $index = max(0, (int)$number - 1);
        $question = $questions->get($index);
        $total = $questions->count();
        return view('landing.posttest.test', compact('class', 'posttest', 'question', 'number', 'total'));
    }

    public function submitPosttest(Request $request, $class_id)
    {
        $user = auth('berbinar')->user();
        $class = Berbinarp_Class::findOrFail($class_id);
        $posttest = $class->posttest;
        if (!$posttest) {
            return redirect()->back()->with('error', 'Posttest tidak ditemukan');
        }
        $answers = $request->input('answers', []);

        // Decode string json
        if (is_string($answers)) {
            $decoded = json_decode($answers, true);
            if (is_array($decoded)) {
                $answers = $decoded;
            } else {
                $answers = [];
            }
        }
        // Simpan ke user_test_results
        $result = Test_Result::updateOrCreate([
            'user_id' => $user->id,
            'test_id' => $posttest->id,
        ], [
            'score' => null,
            'answers' => json_encode($answers),
            'completed_at' => now(),
        ]);

        // Update progres user 
        $progress = User_Progres::updateOrCreate([
            'user_id' => $user->id,
            'test_id' => $posttest->id,
        ], [
            'course_section_id' => null,
            'status_materi' => 'completed',
            'completed_at' => now(),
            'last_accessed' => now(),
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'redirect' => route('landing.posttest.index', ['class_id' => $class_id]),
            ]);
        }
        return redirect()->route('landing.posttest.index', ['class_id' => $class_id]);
    }
}
