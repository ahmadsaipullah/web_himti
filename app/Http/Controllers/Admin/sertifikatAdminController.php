<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\sertifikat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class sertifikatAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sertifikats = sertifikat::simplepaginate(5);
        return view('dashboard.sertifikat.seminar_akademik.index', compact('sertifikats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sertifikat.seminar_akademik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qr = Str::random(20);
        $validasi = $request->validate([
            'nama_peserta' => 'required|string',
            'nim' => 'required|min:10|max:10|string|unique:sertifikats',
            'qrcode' => '',

        ]);

        sertifikat::create([
            'nama_peserta' => request('nama_peserta'),
            'nim' => request('nim'),
            'qrcode' => $qr
        ]);
        alert()->success("{$validasi['nama_peserta']}", 'Berhasil Di Tambah');
        return to_route('sertifikat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(sertifikat $sertifikat)
    {
        return view('dashboard.sertifikat.seminar_akademik.show', compact('sertifikat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(sertifikat $sertifikat)
    {
        return view('dashboard.sertifikat.seminar_akademik.edit', compact('sertifikat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sertifikat $sertifikat)
    {
        $validasi = $request->validate([
            'nama_peserta' => 'required|string',
            'nim' => 'required|min:10|max:10|string|unique:sertifikats,nim,' . $sertifikat->id,
            'qrcode' => ''


        ]);

        $sertifikat->update($validasi);
        alert()->success("{$validasi['nama_peserta']}", 'Berhasil Di Tambah');
        return to_route('sertifikat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(sertifikat $sertifikat)
    {
        $sertifikat->delete();
        alert()->success("{$sertifikat['nama_peserta']}", 'Berhasil Di Hapus');
        return back();
    }

    public function pdf()
    {
        $sertifikats = sertifikat::all();
        $pdf = PDF::loadview('dashboard.sertifikat.seminar_akademik.cetak_sertifikat', compact('sertifikats'))->setPaper('A4', 'landscape');
        return $pdf->download('Sertifikat.pdf');
    }
}
