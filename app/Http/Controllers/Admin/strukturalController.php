<?php

namespace App\Http\Controllers\Admin;

use App\Models\angkatan;
use Illuminate\Http\Request;
use App\Models\struktur_organ;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class strukturalController extends Controller
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
        $strukturals = struktur_organ::with('angkatan')->simplePaginate(5);
        return view('dashboard.struktural.index', compact('strukturals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatans = angkatan::all();
        return view('dashboard.struktural.create', compact('angkatans'));
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

            'nama' => 'required|string',
            'nim' => 'required|string|min:10|unique:struktur_organs',
            'jabatan' => 'required|string|unique:struktur_organs',
            'status' => 'required|string',
            'image' => 'image|required',
            'id_angkatan' => ''


        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/struktural', 'public');
        struktur_organ::create($data);
        alert()->success("{$data['nama']}", 'Berhasil Di Tambah');
        return to_route('struktural.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(struktur_organ $struktural)
    {
        return view('dashboard.struktural.show', compact('struktural'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($struktural)
    {
        $angkatans = angkatan::all();
        $struktural = struktur_organ::with('angkatan')->findOrFail($struktural);
        return view('dashboard.struktural.edit', compact('struktural', 'angkatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, struktur_organ $struktural)
    {
        $request->validate([

            'nama' => 'required|string',
            'nim' => 'required|min:10|max:10|string|unique:struktur_organs,nim,' . $struktural->id,
            'jabatan' =>  'string|required|unique:struktur_organs,nim,' . $struktural->id,
            'status' => 'string|required',
            'image' => 'required|image',
            'id_angkatan' => ''

        ]);

        $dataId = $struktural->find($struktural->id);
        $data = $request->all();
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/struktural', 'public');
        }

        $dataId->update($data);
        alert()->success("{$data['nama']}", 'Berhasil Di Update');
        return to_route('struktural.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(struktur_organ $struktural)
    {
        Storage::delete('public/' . $struktural->image);
        $struktural->delete();
        alert()->success("{$struktural['nama']}", 'Berhasil Di Hapus');
        return back();
    }
}
