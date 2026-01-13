<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    public function materials(Request $request)
    {
        $class_id = $request->input('class_id');
        $section_id = $request->input('section_id');
        $class = \App\Models\Berbinarp_Class::with('sections')->find($class_id);
        if (!$class) {
            abort(404, 'Class not found');
        }
        $section = $class->sections->where('id', $section_id)->first();
        if (!$section) {
            abort(404, 'Section not found');
        }
        $sectionActive = $section->id;
        return view('landing.materials.index', compact('class', 'section', 'sectionActive'));
    }
}
