<?php

namespace App\Http\Controllers\Dashboard\BerbinarPlus\Questions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Test;
use App\Models\Berbinarp_Class;

class PretestQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Berbinarp_Class $class, Test $pretest)
    {
        $pretestId = $pretest->id;
        $questions = $pretest->questions()->get();
        return view('dashboard.berbinar-plus.class.soal.pretest.index', compact('class', 'pretestId', 'questions'));
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
    public function store(Request $request, Berbinarp_Class $class, Test $pretest)
    {
        $validated = $request->validate([
            'type' => 'required|in:multiple_choice,short_answer',
            'question' => 'required',
            'options' => 'nullable',
            'options.*' => 'nullable',
            'correct_answer' => 'nullable',
        ]);

        $question = new Question();
        $question->test_id = $pretest->id;
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

        return redirect()->route('dashboard.kelas.pre-test.index', ['class' => $class->id, 'pretest' => $pretest->id])->with('success', 'Soal pre-test berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berbinarp_Class $class, Test $pretest, Question $question)
    {
        // Return detail soal pre-test dalam bentuk JSON
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
    public function update(Request $request, Berbinarp_Class $class, Test $pretest, Question $question)
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

        return redirect()->route('dashboard.kelas.pre-test.index', ['class' => $class->id, 'pretest' => $pretest->id])->with('success', 'Soal pre-test berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berbinarp_Class $class, Test $pretest, Question $question)
    {
        $question->delete();

        return redirect()->route('dashboard.kelas.pre-test.index', ['class' => $class->id, 'pretest' => $pretest->id])->with('success', 'Soal pre-test berhasil dihapus.');
    }
}
