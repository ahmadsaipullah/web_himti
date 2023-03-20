<?php

namespace App\Http\Controllers\Danus;

use App\Models\merchandise;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class merchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danus_merchandise = merchandise::simplePaginate(5);
        return view('dashboard.danus.merchandise.index', compact('danus_merchandise'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.danus.merchandise.create');
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

            'title' => 'required|string',
            'harga' => 'required|string',
            'image' => 'required|image'

        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/merchandise', 'public');

        if (merchandise::create($data)) {
            alert()->success("{$data['title']}", 'Berhasil Di Tambah');
            return to_route('danus-merchandise.index');
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
    public function edit($danus_merchandise)
    {
        $danus_merchandise = merchandise::findOrFail($danus_merchandise);
        return view('dashboard.danus.merchandise.edit', compact('danus_merchandise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, merchandise $danus_merchandise)
    {
        $dataId = $danus_merchandise->find($danus_merchandise->id);
        $data = $request->all();
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/merchandise', 'public');
        }

        if ($dataId->update($data)) {
            alert()->success("{$data['title']}", 'Berhasil Di update');
            return to_route('danus-merchandise.index');
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
    public function destroy(merchandise $danus_merchandise)
    {
        Storage::delete('public/' . $danus_merchandise->image);
        if ($danus_merchandise->delete()) {
            alert()->success("{$danus_merchandise['title']}", 'Berhasil Di Hapus');
            return back();
        } else {
            alert()->error('Gagal');
            return back();
        }
    }
}
