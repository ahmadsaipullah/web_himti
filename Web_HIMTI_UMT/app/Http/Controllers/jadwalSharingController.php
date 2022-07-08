<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\jadwal_sharing;
use Illuminate\Support\Facades\Storage;

class jadwalSharingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sharings = jadwal_sharing::with('kategori')->paginate(5);
        return view('dashboard.jadwalSharing.index', compact('sharings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = kategori::all();
        return view('dashboard.jadwalSharing.create', compact('kategoris'));

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

            'tittle' => 'required|string',
            'deskripsi' => 'required|string|max:255',
            'jadwal' => 'required|string',
            'image' => 'required|image'

        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/sharing','public');

        jadwal_sharing::create($data);
        return to_route('jadwal-sharing.index')->withSuccess("{$data['tittle']} <br> Berhasil Di Tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(jadwal_sharing $jadwal_sharing)
    {
        return view('dashboard.jadwalSharing.show', compact('jadwal_sharing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(jadwal_sharing $jadwal_sharing)
    {
        return view('dashboard.jadwalSharing.edit', compact('jadwal_sharing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jadwal_sharing $jadwal_sharing)
    {
        $dataId = $jadwal_sharing->find($jadwal_sharing->id);
        $data = $request->all();
        if($request->image){
            Storage::delete('public/'.$dataId->image);
            $data['image'] = $request->file('image')->store('asset/sharing','public');
        }

        $dataId->update($data);
        return to_route('jadwal-sharing.index')->withSuccess("{$data['tittle']} <br> Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(jadwal_sharing $jadwal_sharing)
    {
        $jadwal_sharing->delete();
        return back()->withSuccess("{$jadwal_sharing['tittle']} <br> Berhasil Di Hapus!");
    }
}
