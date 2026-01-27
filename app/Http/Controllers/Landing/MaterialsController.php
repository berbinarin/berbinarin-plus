<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_Class;
use App\Models\User_Progres;

class MaterialsController extends Controller
{
    public function materials(Request $request)
    {
        $class_id = $request->input('class_id');
        $section_id = $request->input('section_id');
        $class = Berbinarp_Class::with(['sections' => function ($q) {
            $q->orderBy('order_key');
        }, 'pretest'])->find($class_id);
        if (!$class) {
            abort(404, 'Class not found');
        }
        $section = $class->sections->where('id', $section_id)->first();
        if (!$section) {
            abort(404, 'Section not found');
        }
        $sectionActive = $section->id;

        // Progres user untuk pretest dan semua section
        $userId = auth('berbinar')->id();
        $pretestCompleted = false;
        if ($class->pretest) {
            $pretestCompleted = User_Progres::where('user_id', $userId)
                ->where('test_id', $class->pretest->id)
                ->where('status_materi', 'completed')
                ->exists();
        }


        $sections = $class->sections;
        $sectionProgress = [];
        foreach ($sections as $i => $sec) {
            $progress = User_Progres::where('user_id', $userId)
                ->where('course_section_id', $sec->id)
                ->where('status_materi', 'completed')
                ->first();
            $sectionProgress[$sec->id] = $progress ? true : false;
        }

        // Logic unlock: section pertama unlock jika pretest complete, section berikutnya unlock jika section sebelumnya sudah complete
        $canAccess = [];
        foreach ($sections as $i => $sec) {
            if ($i === 0) {
                $canAccess[$sec->id] = $pretestCompleted;
            } else {
                $prevSection = $sections[$i - 1];
                $canAccess[$sec->id] = !empty($sectionProgress[$prevSection->id]);
            }
        }

        // Cek posttestCompleted 
        $posttestCompleted = false;
        if ($class->posttest) {
            $posttestCompleted = User_Progres::where('user_id', $userId)
                ->where('test_id', $class->posttest->id)
                ->where('status_materi', 'completed')
                ->exists();
        }

        return view('landing.materials.index', compact('class', 'section', 'sectionActive', 'sections', 'canAccess', 'sectionProgress', 'pretestCompleted', 'posttestCompleted'));
    }

    // Update progres materi via AJAX
    public function updateProgress(Request $request)
    {
        $user = auth('berbinar')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }
        $sectionId = $request->input('course_section_id');
        if (!$sectionId) {
            return response()->json(['success' => false, 'message' => 'Section ID required'], 400);
        }
        $progress = User_Progres::updateOrCreate([
            'user_id' => $user->id,
            'course_section_id' => $sectionId,
        ], [
            'status_materi' => 'completed',
            'completed_at' => now(),
            'last_accessed' => now(),
        ]);
        return response()->json(['success' => true]);
    }
}
