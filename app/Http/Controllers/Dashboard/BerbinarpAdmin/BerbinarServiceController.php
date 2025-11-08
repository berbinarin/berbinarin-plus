<?php

namespace App\Http\Controllers\Dashboard\BerbinarpAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_Service;

class BerbinarServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Berbinarp_Service::all();
        return view('dashboard.admin-pm.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin-pm.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'nullable',
            'schedule' => 'nullable',
            'description' => 'nullable',
            'price' => 'required',
            'price_note' => 'nullable',
        ]);

        Berbinarp_Service::create($validated);

        return redirect()->route('dashboard.admin.layanan.index')->with('success', 'Paket layanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Berbinarp_Service::findOrFail($id);
        return view('dashboard.admin-pm.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'nullable',
            'schedule' => 'nullable',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'price_note' => 'nullable',
        ]);

        $service = Berbinarp_Service::findOrFail($id);
        $service->update($validated);

        return redirect()->route('dashboard.admin.layanan.index')->with('success', 'Paket layanan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Berbinarp_Service::findOrFail($id);
        $service->delete();

        return redirect()->route('dashboard.admin.layanan.index')->with('success', 'Paket layanan berhasil dihapus');
    }
}
