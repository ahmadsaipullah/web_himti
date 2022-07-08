<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\acara;
use App\Models\kategori;

class acaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acaras = acara::with('kategori')->simplePaginate(5);
        return view('dashboard.acara.index', compact('acaras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = kategori::all();
        return view('dashboard.acara.create', compact('kategoris'));
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
        $data['image'] = $request->file('image')->store('asset/acara','public');

        acara::create($data);
        return to_route('acara.index')->withSuccess("{$data['tittle']} <br> Berhasil Di Tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(acara $acara)
    {
        return view('dashboard.acara.show', compact('acara'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(acara $acara)
    {
       return view('dashboard.acara.edit', compact('acara'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, acara $acara)
    {
        $dataId = $acara->find($acara->id);
        $data = $request->all();
        if($request->image){
            Storage::delete('public/'.$dataId->image);
            $data['image'] = $request->file('image')->store('asset/acara','public');
        }

        $dataId->update($data);
        return to_route('acara.index')->withSuccess("{$acara['tittle']} <br> Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(acara $acara)
    {
        $acara->delete();
        return back()->withSuccess("{$acara['tittle']} <br> Berhasil Di Hapus");
    }
}
