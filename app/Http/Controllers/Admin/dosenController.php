<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\dosen;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DosenExport;


class dosenController extends Controller
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
        $dosens = dosen::simplePaginate(5);
        return view('dashboard.dosen.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dosen.create');
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
            'nidn' => 'required|unique:dosens',
            'nama' => 'string|required',
            'email' => 'string|email:dns|unique:dosens|required',
            'no_hp' => 'string|required|min:11|max:13',
            'matakuliah' => 'string|required'

        ]);

        dosen::create($validasi);
        alert()->success("{$validasi['nama']}", 'Berhasil Di Tambah');
        return to_route('dosen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(dosen $dosen)
    {
        return view('dashboard.dosen.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(dosen $dosen)
    {
        return view('dashboard.dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dosen $dosen)
    {
        $validasi = $request->validate([
            'nidn' => 'required|unique:dosens,nidn,' . $dosen->id,
            'nama' => 'string|required',
            'email' => 'string|email:dns|required|unique:dosens,email,' . $dosen->id,
            'no_hp' => 'string|required|min:11|max:13',
            'matakuliah' => 'string|required'

        ]);

        $dosen->update($validasi);
        alert()->success("{$validasi['nama']}", 'Berhasil Di Update');
        return to_route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(dosen $dosen)
    {
        $dosen->delete();
        alert()->success("{$dosen['nama']}", 'Berhasil Di Hapus');
        return back();
    }


    public function pdf()
    {
        $dosens = dosen::all();
        $pdf = PDF::loadview('dashboard.dosen.cetak_data', compact('dosens'))->setPaper('A3', 'potrait');
        return $pdf->download('Data-Dosen.pdf');
    }
    public function excel()
    {
        return Excel::download(new DosenExport, 'Data-Dosen.xlsx');
    }
}
