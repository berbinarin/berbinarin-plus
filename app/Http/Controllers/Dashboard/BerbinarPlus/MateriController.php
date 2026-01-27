<?php

namespace App\Http\Controllers\Dashboard\BerbinarPlus;

use App\Http\Controllers\Controller;
use App\Models\Course_Section;
use App\Models\Berbinarp_Class;
use App\Services\VideoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($classId)
    {
        $materials = Course_Section::where('course_id', $classId)->orderBy('order_key')->get();
        return view('dashboard.berbinar-plus.class.materi.index', compact('classId', 'materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($classId)
    {
        return view('dashboard.berbinar-plus.class.materi.create', compact('classId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $classId)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'video_url' => 'nullable',
            'description' => 'nullable',
            'order_key' => [
                'required',
                'integer',
                'min:1',
                'unique:course_section,order_key,NULL,id,course_id,' . $classId,
            ],
        ], [
            'order_key.unique' => 'Urutan materi sudah digunakan di kelas ini. Silakan pilih urutan lain.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Course_Section::create([
            'course_id' => $classId,
            'title' => $request->title,
            'video_url' => $request->video_url,
            'description' => $request->description,
            'order_key' => $request->order_key,
        ]);

        return redirect()->route('dashboard.kelas.materi.index', ['class' => $classId])->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil',
            'message' => 'Materi Berhasil Ditambahkan',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $material = Course_Section::findOrFail($id);
        $classId = $material->course_id;
        $embedUrl = null;
        if ($material->video_url) {
            try {
                $embedUrl = (new VideoService())->formatEmbedUrl($material->video_url);
            } catch (\Exception $e) {
                $embedUrl = null;
            }
        }
        return view('dashboard.berbinar-plus.class.materi.show', compact('material', 'classId', 'embedUrl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $material = Course_Section::findOrFail($id);
        $classId = $material->course_id;
        return view('dashboard.berbinar-plus.class.materi.edit', compact('material', 'classId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $material = Course_Section::findOrFail($id);
        $classId = $material->course_id;
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'video_url' => 'nullable',
            'description' => 'nullable',
            'order_key' => [
                'required',
                'integer',
                'min:1',
                'unique:course_section,order_key,' . $id . ',id,course_id,' . $classId,
            ],
        ], [
            'order_key.unique' => 'Urutan materi sudah digunakan di kelas ini. Silakan pilih urutan lain.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $material->update([
            'title' => $request->title,
            'video_url' => $request->video_url,
            'description' => $request->description,
            'order_key' => $request->order_key,
        ]);
        return redirect()->route('dashboard.kelas.materi.index', ['class' => $classId])->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil',
            'message' => 'Materi Berhasil Diubah',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $material = Course_Section::findOrFail($id);
        $classId = $material->course_id;
        $material->delete();
        return redirect()->route('dashboard.kelas.materi.index', ['class' => $classId])
            ->with([
                'alert' => true,
                'icon' => asset('assets/images/dashboard/success.webp'),
                'title' => 'Berhasil',
                'message' => 'Materi Berhasil Dihapus',
                'type' => 'success',
            ]);
    }
}
