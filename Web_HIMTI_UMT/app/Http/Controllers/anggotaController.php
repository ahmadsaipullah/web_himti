<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\angkatan;
use Illuminate\Http\Request;

class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggotas = anggota::with('angkatan')->simplePaginate(5);
        return view('dashboard.anggota.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatans = angkatan::all();
        return view('dashboard.anggota.create', compact('angkatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validasi = $request->validate([

            'nama' => 'required|string',
            'nim' => 'required|min:10|max:10|string|unique:anggotas',
            'no_hp' => 'required|min:11|max:13|string',
            'email' =>  'required|email:dns|string|unique:anggotas',
            'id_angkatan' => ''

        ]);

        anggota::create($validasi);
        return to_route('anggota.index')->withSuccess("{$validasi['nama']} <br> Berhasil Di Tambah");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(anggota $anggotum)
    {
        return view('dashboard.anggota.show', compact('anggotum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($anggotum)
    {
        $angkatans = angkatan::all();
        $anggotum = anggota::with('angkatan')->findOrFail($anggotum);
        return view('dashboard.anggota.edit', compact('anggotum','angkatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anggota $anggotum)
    {
        $validasi = $request->validate([

            'nama' => 'required|string',
            'nim' => 'required|min:10|max:10|string|unique:anggotas,nim,'.$anggotum->id,
            'no_hp' => 'required|min:11|max:13|string',
            'email' =>  'required|email:dns|string|unique:anggotas,email,'.$anggotum->id,
            'id_angkatan' => ''

        ]);

        $anggotum->update($validasi);
        return to_route('anggota.index')->withSuccess("{$validasi['nama']} <br> Berhasil Di Update");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(anggota $anggotum)
    {
        $anggotum->delete();
        return back()->withSuccess("{$anggotum['nama']} <br> Berhasil Di Hapus");
    }
}
