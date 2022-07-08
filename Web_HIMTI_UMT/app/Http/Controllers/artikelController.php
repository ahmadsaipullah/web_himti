<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class artikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = artikel::with('kategori')->paginate(5);
        return view('dashboard.artikel.index',compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = kategori::all();
        return view('dashboard.artikel.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'tittle' => 'string|required',
            'deskripsi' => 'string|max:255|required',
            'id_kategori' => '',
            'image' => 'required|image|'

        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/artikel','public');

        artikel::create($data);
        return to_route('artikel.index')->withSuccess("{$data['tittle']} <br> Berhasil Di Tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(artikel $artikel)
    {
        return view('dashboard.artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(artikel $artikel)
    {
       return view('dashboard.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, artikel $artikel)
    {
        $dataId = $artikel->find($artikel->id);
        $data = $request->all();
        if($request->image){
            Storage::delete('public/'.$dataId->image);
            $data['image'] = $request->file('image')->store('asset/artikel','public');
        }

        $dataId->update($data);
        return to_route('artikel.index')->withSuccess("{$artikel['tittle']} <br> Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(artikel $artikel)
    {
        $artikel->delete();
        return back()->withSuccess("{$artikel['tittle']} <br> Berhasil Di Hapus");
    }
}
