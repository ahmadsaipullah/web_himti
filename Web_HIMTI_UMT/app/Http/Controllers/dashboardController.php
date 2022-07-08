<?php

namespace App\Http\Controllers;

use App\Models\acara;
use App\Models\anggota;
use App\Models\artikel;
use Illuminate\Http\Request;
use App\Models\jadwal_sharing;

class dashboardController extends Controller
{
    public function dashboard(){

        $anggota = anggota::all()->count();
        $acara = acara::all()->count();
        $artikel = artikel::all()->count();
        $sharing = jadwal_sharing::all()->count();
        return view('dashboard.dashboard',compact('acara','artikel','sharing','anggota'));
    }

}
