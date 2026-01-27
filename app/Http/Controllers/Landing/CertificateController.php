<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Certificates;
use App\Models\Berbinarp_Class;;
use App\Models\User_Progres;
use App\Models\Berbinarp_User;

class CertificateController extends Controller
{
    public function certificates(Request $request)
    {
        $class_id = $request->query('class_id');
        $class = null;
        $posttest = null;
        $posttestCompleted = false;
        $sectionProgress = [];
        $canAccess = [];
        if ($class_id) {
            $class = Berbinarp_Class::with(['sections' => function ($q) {
                $q->orderBy('order_key');
            }, 'posttest'])->find($class_id);
        }
        if ($class && $class->posttest && auth('berbinar')->check()) {
            $userId = auth('berbinar')->id();
            $posttest = $class->posttest;
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
        // Ambil nama user 
        $userName = '-';
        if (auth('berbinar')->check()) {
            $userId = auth('berbinar')->id();
            $user = Berbinarp_User::find($userId);
            if ($user) {
                $userName = $user->name ?? ($user->first_name . ' ' . $user->last_name);
            }
        }
        return view('landing.certificates.index', compact('class', 'posttest', 'posttestCompleted', 'sectionProgress', 'canAccess', 'userName'));
    }

    public function updateRating(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:berbinarp_class,id',
            'rating' => 'required|numeric',
        ]);
        $class = Berbinarp_Class::find($request->input('class_id'));
        if (!$class) {
            return response()->json(['success' => false, 'message' => 'Kelas tidak ditemukan'], 404);
        }
        // Update rating
        $class->rating = $request->input('rating');
        $class->save();
        return response()->json(['success' => true, 'message' => 'Rating berhasil disimpan']);
    }

    public function downloadCertificate(Request $request)
    {
        $class_id = $request->query('class_id');
        $userId = auth('berbinar')->id();
        $certificate = Certificates::where('course_id', $class_id)
            ->where('user_id', $userId)
            ->first();
        if (!$certificate || !$certificate->certificate_file) {
            // If AJAX, return JSON
            if ($request->ajax()) {
                return response()->json(['success' => false, 'reason' => 'processing'], 404);
            }
            abort(404, 'Sertifikat tidak ditemukan');
        }
        $filePath = public_path('storage/' . $certificate->certificate_file);
        if (!file_exists($filePath)) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'reason' => 'processing'], 404);
            }
            abort(404, 'File sertifikat tidak ditemukan');
        }
        // Return download URL
        if ($request->ajax()) {
            return response()->json(['success' => true, 'download_url' => asset('storage/' . $certificate->certificate_file)]);
        }
        return response()->download($filePath);
    }
}
