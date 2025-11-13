<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_Class;
use App\Models\Berbinarp_User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerbinarPlusClass = Berbinarp_Class::count();
        $totalBerbinarPlusUser = Berbinarp_User::count();
        return view('dashboard.index', compact('totalBerbinarPlusClass', 'totalBerbinarPlusUser'));
    }

    public function admin()
    {
        return view('dashboard.class-pm.user.index');
    }
}
