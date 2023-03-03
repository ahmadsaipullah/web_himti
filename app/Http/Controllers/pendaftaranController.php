<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Mail\kelompok_Belajar;
use App\Models\kelompokBelajar;
use Illuminate\Support\Facades\Mail;

class pendaftaranController extends Controller
{
    public function create()
    {
        $footers = Footer::all();
        return view('kelompok_belajar.create', compact('footers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'string|required',
            'nim' => 'string|required|unique:kelompok_belajars',
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:kelompok_belajars'],
            'kelas' => 'string|required|min:1|max:3',
            'angkatan' => 'string|required|min:4|max:4',
            'bidang' => '',
            'image' => 'file|image|max:2048'
        ]);

        $kelompok_belajar = new kelompokBelajar;
        $kelompok_belajar->nama = $request->nama;
        $kelompok_belajar->nim = $request->nim;
        $kelompok_belajar->email = $request->email;
        $kelompok_belajar->kelas = $request->kelas;
        $kelompok_belajar->angkatan = $request->angkatan;
        $kelompok_belajar->bidang = $request->bidang;
        $kelompok_belajar['image'] = $request->file('image')->store('asset/kelompokbelajar', 'public');

        Mail::to($request->email)->send(new Kelompok_Belajar($request->nama));

        if ($kelompok_belajar->save()) {
            return redirect()->route('kb-sukses', $kelompok_belajar->id);
        } else {
            alert()->error('Gagal');
            return back();
        };
    }

    public function suksesKelompokBelajar($id)
    {
        $dec = request()->id;
        $kb = kelompokBelajar::findOrFail($dec);
        $footers = Footer::all();
        return view('kelompok_belajar.sukses', compact('kb', 'footers'));
    }
}
