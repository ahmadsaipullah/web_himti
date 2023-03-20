<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\anggota;
use App\Models\angkatan;
use Illuminate\Http\Request;
use App\Exports\AnggotaExport;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;



class anggotaController extends Controller
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
        $anggotas = anggota::with('angkatan')->simplePaginate(5);
        return view('dashboard.anggota.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatans = angkatan::all();
        return view('dashboard.anggota.create', compact('angkatans'));
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

            'nama' => 'required|string',
            'nim' => 'required|min:10|max:10|string|unique:anggotas',
            'no_hp' => 'required|min:11|max:13|string',
            'email' =>  'required|email:dns|string|unique:anggotas',
            'no_darurat' => 'required|min:11|max:13|string',
            'alamat' => 'required|string',
            'id_angkatan' => ''

        ]);

        if (anggota::create($validasi)) {
            alert()->success("{$validasi['nama']}", 'Berhasil Di Tambah');
            return to_route('anggota.index');
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
    public function show(anggota $anggotum)
    {
        return view('dashboard.anggota.show', compact('anggotum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($anggotum)
    {
        $angkatans = angkatan::all();
        $anggotum = anggota::with('angkatan')->findOrFail($anggotum);
        return view('dashboard.anggota.edit', compact('anggotum', 'angkatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anggota $anggotum)
    {
        $validasi = $request->validate([

            'nama' => 'required|string',
            'nim' => 'required|min:10|max:10|string|unique:anggotas,nim,' . $anggotum->id,
            'no_hp' => 'required|min:11|max:13|string',
            'email' =>  'required|email:dns|string|unique:anggotas,email,' . $anggotum->id,
            'no_darurat' => 'required|min:11|max:13|string',
            'alamat' => 'required|string',
            'id_angkatan' => ''

        ]);

        if ($anggotum->update($validasi)) {
            alert()->success("{$validasi['nama']}", 'Berhasil Di Update');
            return to_route('anggota.index');
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
    public function destroy(anggota $anggotum)
    {
        if ($anggotum->delete()) {
            alert()->success("{$anggotum['nama']}", 'Berhasil Di Hapus');
            return back();
        } else {
            alert()->error('Gagal');
            return back();
        }
    }


    public function pdf()
    {
        $anggotas = anggota::all();
        $pdf = PDF::loadview('dashboard.anggota.cetak_anggota', compact('anggotas'))->setPaper('A3', 'potrait');
        return $pdf->download('Data-Anggota.pdf');
    }
    public function excel()
    {
        return Excel::download(new AnggotaExport, 'Data-Anggota.xlsx');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        // mengambil data dari table pegawai sesuai pencarian data
        $anggotas = anggota::with('angkatan')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate();
        // mengirim data pegawai ke view index
        return view('dashboard.anggota.index', compact('anggotas'));
    }
}
