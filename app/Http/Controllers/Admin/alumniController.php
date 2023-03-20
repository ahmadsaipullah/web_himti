<?php

namespace App\Http\Controllers\Admin;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class alumniController extends Controller
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
        $alumnis = Alumni::simplePaginate(5);
        return view('dashboard.alumni.index', compact('alumnis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.alumni.create');
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
            'perusahaan' => 'required|string',
            'title' => 'required|string',
            'image' => 'file|image|required',

        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/alumni', 'public');
        if (Alumni::create($data)) {
            alert()->success("{$data['nama']}", 'Berhasil Di Tambah');
            return to_route('alumni.index');
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
    public function show(Alumni $alumnus)
    {
        return view('dashboard.alumni.show', compact('alumnus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumni $alumnus)
    {
        return view('dashboard.alumni.edit', compact('alumnus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumni $alumnus)
    {
        $request->validate([

            'nama' => 'required|string',
            'perusahaan' => 'required|string',
            'title' => 'required|string',
            'image' => 'image',

        ]);

        $dataId = $alumnus->find($alumnus->id);
        $data = $request->all();
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/alumni', 'public');
        }

        if ($dataId->update($data)) {
            alert()->success("{$data['nama']}", 'Berhasil Di Update');
            return to_route('alumni.index');
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
    public function destroy(Alumni $alumnus)
    {
        Storage::delete('public/' . $alumnus->image);
        if ($alumnus->delete()) {
            alert()->success("{$alumnus['nama']}", 'Berhasil Di Hapus');
            return back();
        } else {
            alert()->error('Gagal');
            return back();
        }
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        // mengambil data dari table pegawai sesuai pencarian data
        $alumnis = DB::table('alumnis')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate();
        // mengirim data pegawai ke view index
        return view('dashboard.alumni.index', compact('alumnis'));
    }
}
