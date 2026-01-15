<?php

namespace App\Http\Controllers\Dashboard\BerbinarPlus\Questions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Test;
use App\Models\Berbinarp_Class;

class PosttestQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Berbinarp_Class $class, Test $posttest)
    {
        $posttestId = $posttest->id;
        $questions = $posttest->questions()->get();
        return view('dashboard.berbinar-plus.class.soal.posttest.index', compact('class', 'posttestId', 'questions'));
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
    public function store(Request $request, Berbinarp_Class $class, Test $posttest)
    {
        $validated = $request->validate([
            'type' => 'required|in:multiple_choice,short_answer',
            'question' => 'required',
            'options' => 'nullable',
            'options.*' => 'nullable',
            'correct_answer' => 'nullable',
        ]);

        $question = new Question();
        $question->test_id = $posttest->id;
        $question->type = $validated['type'];
        $question->question_text = $validated['question'];
        if ($validated['type'] === 'multiple_choice') {
            $question->options = $request->input('options', []);
            $correct = null;
            foreach ($question->options as $abjad => $opt) {
                if (isset($opt['status']) && $opt['status'] === 'benar') {
                    $correct = $abjad;
                }
            }
            $question->correct_answer = $correct;
        } else {
            $question->options = null;
            $question->correct_answer = $request->input('correct_answer');
        }
        $question->save();

        return redirect()->route('dashboard.kelas.post-test.index', ['class' => $class->id, 'posttest' => $posttest->id])->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil',
            'message' => 'Soal Post-Test Berhasil Ditambahkan',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Berbinarp_Class $class, Test $posttest, Question $question)
    {
        // Return detail soal post-test dalam bentuk JSON
        return response()->json([
            'id' => $question->id,
            'type' => $question->type,
            'question_text' => $question->question_text,
            'options' => $question->options,
            'correct_answer' => $question->correct_answer,
        ]);
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
    public function update(Request $request, Berbinarp_Class $class, Test $posttest, Question $question)
    {
        $validated = $request->validate([
            'type' => 'required|in:multiple_choice,short_answer',
            'question' => 'required',
            'options' => 'nullable',
            'options.*' => 'nullable',
            'correct_answer' => 'nullable',
        ]);

        $question->type = $validated['type'];
        $question->question_text = $validated['question'];

        if ($validated['type'] === 'multiple_choice') {
            $question->options = $request->input('options', []);
            $correct = null;
            foreach ($question->options as $abjad => $opt) {
                if (isset($opt['status']) && $opt['status'] === 'benar') {
                    $correct = $abjad;
                }
            }
            $question->correct_answer = $correct;
        } else {
            $question->options = null;
            $question->correct_answer = $request->input('correct_answer');
        }

        $question->save();

        return redirect()->route('dashboard.kelas.post-test.index', ['class' => $class->id, 'posttest' => $posttest->id])->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil',
            'message' => 'Soal Post-Test Berhasil Diubah',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berbinarp_Class $class, Test $posttest, Question $question)
    {
        $question->delete();

        return redirect()->route('dashboard.kelas.post-test.index', ['class' => $class->id, 'posttest' => $posttest->id])->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil',
            'message' => 'Soal Post-Test Berhasil Dihapus',
            'type' => 'success',
        ]);
    }
}
