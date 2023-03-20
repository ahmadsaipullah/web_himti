<?php

namespace App\Http\Controllers\Admin;

use App\Models\artikel;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class artikelController extends Controller
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
        $artikels = artikel::with('kategori')->paginate(5);
        return view('dashboard.artikel.index', compact('artikels'));
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
            'deskripsi' => 'string|required',
            'id_kategori' => '',
            'image' => 'required|image'

        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/artikel', 'public');

        if (artikel::create($data)) {
            alert()->success("{$data['tittle']}", 'Berhasil Di Tambah');
            return to_route('artikel.index');
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
    public function edit($artikel)
    {
        $kategoris = kategori::all();
        $artikel = artikel::with('kategori')->findOrFail($artikel);
        return view('dashboard.artikel.edit', compact('artikel', 'kategoris'));
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
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/artikel', 'public');
        }

        if ($dataId->update($data)) {
            alert()->success("{$artikel['tittle']}", 'Berhasil Di Update');
            return to_route('artikel.index');
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
    public function destroy(artikel $artikel)
    {
        Storage::delete('public/' . $artikel->image);
        if ($artikel->delete()) {
            alert()->success("{$artikel['tittle']}", 'Berhasil Di Hapus');
            return back();
        } else {
            alert()->error('Gagal');
            return back();
        }
    }
}
