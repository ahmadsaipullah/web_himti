<?php

namespace App\Http\Controllers\Admin;

use App\Models\acara;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class acaraController extends Controller
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

            'tittle' => 'required|string',
            'deskripsi' => 'required|string',
            'jadwal' => 'required|string',
            'pengisi_acra' => 'required|string',
            'lokasi' => 'required|string',
            'image' => 'required|image',
            'id_kategori' => ''

        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/acara', 'public');;

        if (acara::create($data)) {
            alert()->success("{$data['tittle']}", 'Berhasil Di Tambah');
            return to_route('acara.index');
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
    public function edit($acara)
    {
        $kategoris = kategori::all();
        $acara = acara::with('kategori')->findOrFail($acara);
        return view('dashboard.acara.edit', compact('acara', 'kategoris'));
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
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/acara', 'public');
        }

        if ($dataId->update($data)) {
            alert()->success("{$acara['tittle']}", 'Berhasil Di Update');
            return to_route('acara.index');
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
    public function destroy(acara $acara)
    {
        Storage::delete('public/' . $acara->image);
        if ($acara->delete()) {
            alert()->success("{$acara['tittle']}", 'Berhasil Di Hapus');
            return back();
        } else {
            alert()->error('Gagal');
            return back();
        }
    }
}
