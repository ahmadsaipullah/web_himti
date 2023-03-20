<?php

namespace App\Http\Controllers\Setting;

use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = slider::simplepaginate(5);
        return view('dashboard.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slider.create');
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
        $data['image'] = $request->file('image')->store('asset/slider', 'public');

        if (slider::create($data)) {
            alert()->success("{$data['title']}", 'Berhasil Di Tambah');
            return to_route('slider.index');
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
    public function edit($slider)
    {
        $slider = slider::findOrFail($slider);
        return view('dashboard.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, slider $slider)
    {
        $dataId = $slider->find($slider->id);
        $data = $request->all();
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/slider', 'public');
        }

        if ($dataId->update($data)) {
            alert()->success("{$data['title']}", 'Berhasil Di update');
            return to_route('slider.index');
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
    public function destroy(slider $slider)
    {
        Storage::delete('public/' . $slider->image);
        if ($slider->delete()) {
            alert()->success("{$slider['title']}", 'Berhasil Di Hapus');
            return back();
        } else {
            alert()->error('Gagal');
            return back();
        }
    }
}
