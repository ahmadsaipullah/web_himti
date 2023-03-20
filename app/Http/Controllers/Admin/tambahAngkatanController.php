<?php

namespace App\Http\Controllers\Admin;

use App\Models\angkatan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class tambahAngkatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        if (angkatan::create($validasi)) {
            alert()->success("{$validasi['angkatan']}", 'Berhasil Di Tambah');
            return to_route('angkatan.index');
        } else {
            alert()->error('Gagal');
            return back();
        }
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

            'angkatan' => 'required|max:4|unique:angkatans,angkatan,' . $angkatan->id
        ]);

        if ($angkatan->update($validasi)) {
            alert()->success("{$validasi['angkatan']}", 'Berhasil Di Update');
            return to_route('angkatan.index');
        } else {
            alert()->error('Gagal');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(angkatan $angkatan)
    {
        if ($angkatan->delete()) {
            alert()->success("{$angkatan['angkatan']}", 'Berhasil Di Hapus');
            return back();
        } else {
            alert()->error('Gagal');
            return back();
        }
    }
}
