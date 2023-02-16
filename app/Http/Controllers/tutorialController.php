<?php

namespace App\Http\Controllers;

use App\Models\tutorial;
use Illuminate\Http\Request;

class tutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutorials = tutorial::simplepaginate(5);
        return view('dashboard.tutorial.index', compact('tutorials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tutorial.create');
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
            'judul' => 'required|string',
            'link' => 'required|string'
        ]);

        tutorial::create($validasi);
        alert()->success("{$validasi['judul']}", 'Berhasil Di Tambah');
        return to_route('tutorial.index');
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
    public function edit(tutorial $tutorial)
    {
        return view('dashboard.tutorial.edit', compact('tutorial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tutorial $tutorial)
    {
        $validasi = $request->validate([
            'judul' => 'required|string',
            'link' => 'required|string'
        ]);

        $tutorial->update($validasi);
        alert()->success("{$validasi['judul']}", 'Berhasil Di Update');
        return to_route('tutorial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(tutorial $tutorial)
    {
        $tutorial->delete();
        alert()->success("{$tutorial['judul']}", 'Berhasil Di Hapus');
        return back();
    }
}
