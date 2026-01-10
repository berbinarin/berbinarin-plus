<?php

namespace App\Http\Controllers\Dashboard\BerbinarPlus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_Class;
use App\Models\Test;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Berbinarp_Class::with(['tests' => function ($q) {
            $q->whereIn('type', ['pretest', 'posttest']);
        }])->withCount('enrollments')->get();
        
        return view('dashboard.berbinar-plus.class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.berbinar-plus.class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required',
            'name' => 'required',
            'instructor_name' => 'required',
            'instructor_title' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:1024',
        ],  [
            'thumbnail.max' => 'Ukuran file thumbnail tidak boleh lebih dari 1 MB.',
        ]);

        // Proses upload thumbnail
        $filename = null;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/thumbnails'), $filename);
        }

        // Simpan ke database
        Berbinarp_Class::create([
            'category' => $validated['category'] ?? null,
            'name' => $validated['name'],
            'instructor_name' => $validated['instructor_name'] ?? null,
            'instructor_title' => $validated['instructor_title'] ?? null,
            'thumbnail' => $filename,
        ]);
        return redirect()->route('dashboard.kelas.index')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil!',
            'message' => 'Kelas berhasil ditambahkan.',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = Berbinarp_Class::findOrFail($id);
        return view('dashboard.berbinar-plus.class.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Berbinarp_Class::findOrFail($id);
        return view('dashboard.berbinar-plus.class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category' => 'required',
            'name' => 'required',
            'instructor_name' => 'required',
            'instructor_title' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ], [
            'thumbnail.max' => 'Ukuran file thumbnail tidak boleh lebih dari 1 MB.',
        ]);

        $class = Berbinarp_Class::findOrFail($id);

        // Proses upload thumbnail jika ada file baru
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/thumbnails'), $filename);
            $class->thumbnail = $filename;
        }

        $class->category = $validated['category'] ?? null;
        $class->name = $validated['name'];
        $class->instructor_name = $validated['instructor_name'] ?? null;
        $class->instructor_title = $validated['instructor_title'] ?? null;
        $class->save();

        return redirect()->route('dashboard.kelas.index')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil!',
            'message' => 'Kelas berhasil diubah.',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = Berbinarp_Class::findOrFail($id);
        $class->delete();
        return redirect()->route('dashboard.kelas.index')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Berhasil!',
            'message' => 'Kelas berhasil dihapus.',
            'type' => 'success',
        ]);
    }
}
