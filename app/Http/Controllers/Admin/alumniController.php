<?php

namespace App\Http\Controllers\Admin;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class alumniController extends Controller
{

    public function __construct()
    {
        $this->middleware('adminsuper');
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
        Alumni::create($data);
        alert()->success("{$data['nama']}", 'Berhasil Di Tambah');
        return to_route('alumni.index');
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

        $dataId->update($data);
        alert()->success("{$data['nama']}", 'Berhasil Di Update');
        return to_route('alumni.index');
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
        $alumnus->delete();
        alert()->success("{$alumnus['nama']}", 'Berhasil Di Hapus');
        return back();
    }
}
