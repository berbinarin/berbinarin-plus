<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerbinarPlusUserController extends Controller
{
    public function index()
    {
        return view('dashboard.class-pm.berbinar-plus.user.index');
    }

    public function create()
    {
        return view('dashboard.class-pm.berbinar-plus.user.create');
    }

    public function show()
    {
        // $class = Berbinarp_user::with(['enrollments'])->findOrFail($id);
        // return view('dashboard.class-pm.berbinar-plus.user.show', compact('class'));
        return view('dashboard.class-pm.berbinar-plus.user.show');
    }

    public function edit()
    {
        // $class = Berbinarp_user::findOrFail($id);
        // return view('dashboard.class-pm.berbinar-plus.user.edit', compact('class'));
        return view('dashboard.class-pm.berbinar-plus.user.edit');
    }

    public function destroy(string $id)
    {
        // $class = Berbinarp_user::findOrFail($id);
        // $class->delete();
        return redirect()->route('dashboard.berbinar-class.index')->with('success', 'Kelas berhasil dihapus');
    }
}
