<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class tambahKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $kategoris = kategori::simplePaginate(5);
       return view('dashboard.kategori.index', compact('kategoris'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategori.create');
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

            'nama_kategori' => 'string|required|unique:kategoris'

        ]);

        kategori::create($validasi);
        return to_route('kategori.index')->withSuccess("{$validasi['nama_kategori']} <br> Berhasil Di Tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        return view('dashboard.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori $kategori)
    {
        return view('dashboard.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategori $kategori)
    {
        $validasi = $request->validate([

            'nama_kategori' => 'string|required|unique:kategoris,nama_kategori,'.$kategori->id

        ]);

        $kategori->update($validasi);
        return to_route('kategori.index')->withSuccess("{$validasi['nama_kategori']} <br> Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori $kategori)
    {
        $kategori->delete();
        return back()->withSuccess("{$kategori['nama_kategori']} <br> Berhasil Di Hapus");
    }
}
