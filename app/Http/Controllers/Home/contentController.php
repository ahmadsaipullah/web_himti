<?php

namespace App\Http\Controllers\Home;

use App\Models\acara;
use App\Models\Alumni;
use App\Models\Footer;
use App\Models\artikel;
use App\Models\tutorial;
use App\Models\sertifikat;
use App\Models\partnership;
use App\Models\jadwal_sharing;
use App\Models\struktur_organ;
use Illuminate\Routing\Controller;

class contentController extends Controller
{
    public function  home()
    {
        $footers = Footer::all();
        $alumni = Alumni::all();
        $partnership = partnership::all();
        $sharing = jadwal_sharing::simplePaginate(1);
        $acara = acara::simplepaginate(1);
        return view('include-content.home', compact('sharing', 'acara', 'alumni', 'footers', 'partnership'));
    }

    public function tentang()
    {
        $footers = Footer::all();
        $about = struktur_organ::all();
        return view('include-content.tentang', compact('about', 'footers'));
    }

    public function sharing()
    {
        $footers = Footer::all();
        $sharings = jadwal_sharing::all();
        return view('include-content.sharing', compact('sharings', 'footers'));
    }

    public function tutorial()
    {
        $tutorial = tutorial::all();
        $footers = Footer::all();
        return view('include-content.tutorial', compact('footers', 'tutorial'));
    }

    public function agenda()
    {
        $partnership = partnership::all();
        $footers = Footer::all();
        $agendas = acara::all();
        return view('include-content.agenda', compact('agendas', 'footers', 'partnership'));
    }

    public function artikel()
    {
        $footers = Footer::all();
        $artikels = artikel::all();
        return view('include-content.artikel', compact('artikels', 'footers'));
    }

    public function klinik()
    {
        $footers = Footer::all();
        return view('include-content.klinik', compact('footers'));
    }

    public function detailAgenda(acara $agenda)
    {
        $footers = Footer::all();
        return view('include-content.detail_agenda', compact('agenda', 'footers'));
    }

    public function detailArtikel(artikel $artikel)
    {
        $footers = Footer::all();
        return view('include-content.detail_artikel', compact('artikel', 'footers'));
    }

    public function footer(Footer $footer)
    {
        $footers = Footer::all();
        return view('kerangka.master', compact('footer', 'footers'));
    }

    public function show(sertifikat $sertifikat)
    {
        return view('dashboard.sertifikat.seminar_akademik.show', compact('sertifikat'));
    }
}
