<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function preview($class_id)
    {
        $class = \App\Models\Berbinarp_Class::find($class_id);
        if (!$class) {
            abort(404, 'Class not found');
        }
        return view('landing.preview.index', compact('class'));
    }
}
