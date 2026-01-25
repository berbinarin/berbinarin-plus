<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_Class;
use App\Models\Berbinarp_User;
use App\Models\EnrollmentUser;
use App\Models\BerbinarpUserStatus;

class DashboardController extends Controller
{

    public function index()
    {
        $totalBerbinarPlusClass = Berbinarp_Class::count();
        $totalBerbinarPlusUser = Berbinarp_User::count();

        // Placeholder chart
        $kelas1 = 78;
        $kelas2 = 49;
        $kelas3 = 83;
        $kelas4 = 66;
        $kelas5 = 27;

        // Ambil user dengan status 'pending'
        $pendingStatus = BerbinarpUserStatus::where('name', 'pending')->first();
        $pendingUsers = collect();
        if ($pendingStatus) {
            $pendingUsers = Berbinarp_User::where('user_status_id', $pendingStatus->id)->get();
        }

        // Ambil enrollment dengan status_kelas 'pending_payment' (atau status lain sesuai kebutuhan)
        $enrollmentBaru = EnrollmentUser::where('status_kelas', 'pending_payment')
            ->with(['user', 'course'])
            ->get();

        return view('dashboard.index', compact(
            'totalBerbinarPlusClass',
            'totalBerbinarPlusUser',
            'kelas1',
            'kelas2',
            'kelas3',
            'kelas4',
            'kelas5',
            'pendingUsers',
            'enrollmentBaru'
        ));
    }

    public function admin()
    {
        return view('dashboard.class-pm.user.index');
    }
}
