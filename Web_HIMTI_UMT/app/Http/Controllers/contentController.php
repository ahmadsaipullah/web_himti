<?php

namespace App\Http\Controllers;

use App\Models\acara;
use App\Models\artikel;
use App\Models\jadwal_sharing;
use Illuminate\Http\Request;

class contentController extends Controller
{
    public function  home()
    {
      $sharing = jadwal_sharing::simplePaginate(1);
      $acara = acara::simplepaginate(1);
      return view('include-content.home', compact('sharing','acara'));
    }

    public function tentang()
    {
        return view('include-content.tentang');
    }

    public function sharing()
    {
        $sharings = jadwal_sharing::all();
        return view('include-content.sharing', compact('sharings'));
    }

    public function tutorial()
    {
        return view('include-content.tutorial');
    }

    public function agenda()
    {
        $agendas = acara::all();
        return view('include-content.agenda', compact('agendas'));
    }

    public function artikel()
    {
        $artikels = artikel::all();
        return view('include-content.artikel', compact('artikels'));
    }

    public function klinik()
    {
        return view('include-content.klinik');
    }

    public function detailAgenda(acara $agenda)
    {
        return view('include-content.detail_agenda',compact('agenda'));
    }

    public function detailArtikel(artikel $artikel)
    {
        return view('include-content.detail_artikel', compact('artikel'));
    }
}
