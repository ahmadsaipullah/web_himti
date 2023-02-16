<?php

namespace App\Http\Controllers\Admin;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\jadwal_sharing;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class jadwalSharingController extends Controller
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
            'deskripsi' => 'required|string',
            'jadwal' => 'required|string',
            'pemateri' => 'required|string',
            'ruangan' => 'required|string',
            'image' => 'required|image',
            'id_kategori' => ''

        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/sharing', 'public');

        jadwal_sharing::create($data);
        alert()->success("{$data['tittle']}", 'Berhasil Di Tambah');
        return to_route('jadwal-sharing.index');
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
    public function edit($jadwal_sharing)
    {
        $kategoris = kategori::all();
        $jadwal_sharing = jadwal_sharing::with('kategori')->findOrFail($jadwal_sharing);
        return view('dashboard.jadwalSharing.edit', compact('jadwal_sharing', 'kategoris'));
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
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/sharing', 'public');
        }

        $dataId->update($data);
        alert()->success("{$data['tittle']}", 'Berhasil Di Update');
        return to_route('jadwal-sharing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(jadwal_sharing $jadwal_sharing)
    {
        Storage::delete('public/' . $jadwal_sharing->image);
        $jadwal_sharing->delete();
        alert()->success("{$jadwal_sharing['tittle']}", 'Berhasil Di Hapus');
        return back();
    }
}
