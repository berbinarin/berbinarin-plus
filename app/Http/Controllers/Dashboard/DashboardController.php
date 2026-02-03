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

        // Ambil data kelas dan jumlah pendaftarnya
        $classChartData = Berbinarp_Class::withCount('enrollments')->get(['id', 'name']);
        $chartLabels = $classChartData->pluck('name')->toArray();
        $chartValues = $classChartData->pluck('enrollments_count')->toArray();

        // Ambil user dengan status 'pending'
        $pendingStatus = BerbinarpUserStatus::where('name', 'pending')->first();
        $pendingUsers = collect();
        if ($pendingStatus) {
            $pendingUsers = Berbinarp_User::where('user_status_id', $pendingStatus->id)->get();
        }

        // Ambil enrollment dengan status_kelas 'pending_payment' 
        $enrollmentBaru = EnrollmentUser::where('status_kelas', 'pending_payment')
            ->with(['user', 'course'])
            ->get();

        return view('dashboard.index', compact(
            'totalBerbinarPlusClass',
            'totalBerbinarPlusUser',
            'chartLabels',
            'chartValues',
            'pendingUsers',
            'enrollmentBaru'
        ));
    }

    public function admin()
    {
        return view('dashboard.class-pm.user.index');
    }
}
