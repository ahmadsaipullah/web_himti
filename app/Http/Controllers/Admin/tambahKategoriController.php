<?php

namespace App\Http\Controllers\Admin;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Exports\KategoriExport;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use PDF;



class tambahKategoriController extends Controller
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
        $kategoris = kategori::simplePaginate(5);
        return view('dashboard.kategori.index', compact('kategoris'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategori.create');
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

            'nama_kategori' => 'string|required|unique:kategoris'

        ]);

        kategori::create($validasi);
        alert()->success("{$validasi['nama_kategori']}", 'Berhasil Di Tambah');
        return to_route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        return view('dashboard.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori $kategori)
    {
        return view('dashboard.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategori $kategori)
    {
        $validasi = $request->validate([

            'nama_kategori' => 'string|required|unique:kategoris,nama_kategori,' . $kategori->id

        ]);

        $kategori->update($validasi);
        alert()->success("{$validasi['nama_kategori']}", 'Berhasil Di Update');
        return to_route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori $kategori)
    {
        $kategori->delete();
        alert()->success("{$kategori['nama_kategori']}", 'Berhasil Di Hapus');
        return back();
    }


    public function pdf()
    {

        $kategoris = kategori::all();
        $pdf = PDF::loadview('dashboard.kategori.cetak_data', compact('kategoris'))->setPaper('A4', 'potrait');
        return $pdf->download('Data-kategori.pdf');
    }

    public function excel()
    {
        return Excel::download(new KategoriExport, 'Data-kategori.xlsx');
    }
}
