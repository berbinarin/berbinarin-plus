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

        /**
        * Ini buat placeholder variable yang bakal ditampilkan di chart.
        * Jadi tuh ini rumusnya si chart ini, dia menampilkan tiap bar sebagai satu kelas.
        * Tiap-tiap bar ini menampilkan 'Average Total Progress' tiap kelas.
        * 'Average Total Progress' atau ATP adalah rata-rata dari jumlah progress dari semua user yang mendaftar di kelas tersebut.
        * jadi ATP = (total semua progress dari semua user kelas tersebut) / (total user kelas tersebut)
        */

        $kelas1 = 78;
        $kelas2 = 49;
        $kelas3 = 83;
        $kelas4 = 66;
        $kelas5 = 27;
        return view('dashboard.index', compact('totalBerbinarPlusClass', 'totalBerbinarPlusUser', 'kelas1', 'kelas2', 'kelas3', 'kelas4', 'kelas5'));
    }

    public function admin()
    {
        return view('dashboard.class-pm.user.index');
    }
}
