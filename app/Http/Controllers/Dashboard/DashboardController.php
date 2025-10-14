<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    

    public function berbinarclass()
    {
        return view('dashboard.class-pm.class.index');
    }
    
    public function admin()
    {
        return view('dashboard.class-pm.user.index');
    }
}
