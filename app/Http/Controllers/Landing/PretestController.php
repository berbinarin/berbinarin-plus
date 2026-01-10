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
}
