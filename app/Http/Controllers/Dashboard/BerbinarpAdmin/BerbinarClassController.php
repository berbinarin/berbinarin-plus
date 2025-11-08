<?php

namespace App\Http\Controllers\Dashboard\BerbinarpAdmin;

use App\Models\Berbinarp_Class;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerbinarClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Berbinarp_Class::all();
        return view('dashboard.admin-pm.class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin-pm.class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'syllabus' => 'required|array|min:1',
            'syllabus.*.title' => 'required|string',
            'syllabus.*.details' => 'required|string',
        ]);

        // Proses upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/thumbnails'), $filename);
        } else {
            $filename = null;
        }

        // Simpan ke database
        Berbinarp_Class::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'thumbnail' => $filename,
            'syllabus' => json_encode($validated['syllabus']),
        ]);

        return redirect()->route('dashboard.admin.class.index')->with('success', 'Class berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $class = Berbinarp_Class::findOrFail($id);
        return view('dashboard.admin-pm.class.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Berbinarp_Class::findOrFail($id);
        return view('dashboard.admin-pm.class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'syllabus' => 'required|array|min:1',
            'syllabus.*.title' => 'required|string',
            'syllabus.*.details' => 'required|string',
        ]);

        $class = Berbinarp_Class::findOrFail($id);

        // Proses upload thumbnail jika ada file baru
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/thumbnails'), $filename);
            $class->thumbnail = $filename;
        }

        $class->name = $validated['name'];
        $class->description = $validated['description'];
        $class->syllabus = json_encode($validated['syllabus']);
        $class->save();

        return redirect()->route('dashboard.admin.class.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = Berbinarp_Class::findOrFail($id);
        $class->delete();

        return redirect()->route('dashboard.admin.class.index')->with('success', 'Data berhasil dihapus');
    }
}
