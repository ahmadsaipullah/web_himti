<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Illuminate\Http\Request;
use App\Models\kelompokBelajar;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\kelompokBelajarExport;
use Illuminate\Support\Facades\Storage;

class kelompokBelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelompokbelajar = kelompokBelajar::simplepaginate(5);
        return view('kelompok_belajar.index', compact('kelompokbelajar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kelompokbelajar)
    {
        $kelompokbelajar = kelompokBelajar::findOrFail($kelompokbelajar);
        return view('kelompok_belajar.edit', compact('kelompokbelajar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kelompokBelajar $kelompokbelajar)
    {
        $dataId = $kelompokbelajar->find($kelompokbelajar->id);
        $data = $request->all();
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/kelompokbelajar', 'public');
        }

        $dataId->update($data);
        alert()->success("{$data['nama']}", 'Berhasil Di Update');
        return to_route('kelompokbelajar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(kelompokBelajar $kelompokbelajar)
    {
        Storage::delete('public/' . $kelompokbelajar->image);
        $kelompokbelajar->delete();
        alert()->success("{$kelompokbelajar['nama']}", 'Berhasil Di Hapus');
        return back();
    }


    public function pdf()
    {
        $kelompokbelajar = kelompokBelajar::all();
        $pdf = PDF::loadview('kelompok_belajar.cetak', compact('kelompokbelajar'))->setPaper('A2', 'landscape');
        return $pdf->download('Data-Kelompok-Belajar.pdf');
    }

    public function excel()
    {
        return Excel::download(new kelompokBelajarExport, 'Data-kelompok-belajar.xlsx');
    }
}
