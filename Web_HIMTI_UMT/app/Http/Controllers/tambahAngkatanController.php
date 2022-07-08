<?php

namespace App\Http\Controllers;

use App\Models\angkatan;
use Illuminate\Http\Request;

class tambahAngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tambahAngkatan = angkatan::simplePaginate(5);
        return view('dashboard.angkatan.index', compact('tambahAngkatan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.angkatan.create');
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

            'angkatan' => 'required|max:4|unique:angkatans'
        ]);

        angkatan::create($validasi);
        return to_route('angkatan.index')->withSuccess("{$validasi['angkatan']} <br> Berhasil Di Tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(angkatan $angkatan)
    {
        return view('dashboard.angkatan.show', compact('angkatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(angkatan $angkatan)
    {
        return view('dashboard.angkatan.edit', compact('angkatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, angkatan $angkatan)
    {
        $validasi = $request->validate([

            'angkatan' => 'required|max:4|unique:angkatans,angkatan,'.$angkatan->id
        ]);

        $angkatan->update($validasi);
        return to_route('angkatan.index')->withSuccess("{$validasi['angkatan']} <br> Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(angkatan $angkatan)
    {
        $angkatan->delete();
        return back()->withSuccess("{$angkatan['angkatan']} <br> Berhasil Di Hapus");
    }
}
