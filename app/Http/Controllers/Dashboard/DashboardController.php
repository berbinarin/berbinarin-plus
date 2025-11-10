<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerbinarPlusClass = 10;
        $totalBerbinarPlusUser = 50;
        return view('dashboard.index', compact('totalBerbinarPlusClass', 'totalBerbinarPlusUser'));
    }

    public function admin()
    {
        return view('dashboard.class-pm.user.index');
    }
}
