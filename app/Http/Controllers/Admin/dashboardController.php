<?php

namespace App\Http\Controllers\Admin;

use App\Models\acara;
use App\Models\level;
use App\Models\anggota;
use App\Models\artikel;
use App\Models\jadwal_sharing;
use App\Models\User;
use Illuminate\Routing\Controller;


class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard()
    {

        $level = level::all();
        $anggota = anggota::all()->count();
        $acara = acara::all()->count();
        $artikel = artikel::all()->count();
        $sharing = jadwal_sharing::all()->count();
        $admin = User::all()->count();
        return view('dashboard.dashboard', compact('acara', 'artikel', 'sharing', 'anggota', 'admin'));
    }
}
