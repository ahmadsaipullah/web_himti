<?php

namespace App\Http\Controllers\Danus;

use App\Models\danus;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class danusSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danus_slider = danus::simplepaginate(5);
        return view('dashboard.danus.index', compact('danus_slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.danus.create');
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
            'image' => 'required|image'

        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/danus', 'public');

        if (danus::create($data)) {
            alert()->success("{$data['title']}", 'Berhasil Di Tambah');
            return to_route('danus-slider.index');
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
    public function edit($danus_slider)
    {
        $danus_slider = danus::findOrFail($danus_slider);
        return view('dashboard.danus.edit', compact('danus_slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, danus $danus_slider)
    {
        $dataId = $danus_slider->find($danus_slider->id);
        $data = $request->all();
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/danus', 'public');
        }

        if ($dataId->update($data)) {
            alert()->success("{$data['title']}", 'Berhasil Di update');
            return to_route('danus-slider.index');
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
    public function destroy(danus $danus_slider)
    {
        Storage::delete('public/' . $danus_slider->image);
        if ($danus_slider->delete()) {
            alert()->success("{$danus_slider['title']}", 'Berhasil Di Hapus');
            return back();
        } else {
            alert()->error('Gagal');
            return back();
        }
    }
}
