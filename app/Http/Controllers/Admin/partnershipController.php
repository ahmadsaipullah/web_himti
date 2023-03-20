<?php

namespace App\Http\Controllers\Admin;

use App\Models\partnership;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class partnershipController extends Controller
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
        $partnerships = partnership::simplepaginate(5);
        return view('dashboard.partnership.index', compact('partnerships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.partnership.create');
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
            'nama' => 'string|required',
            'perusahaan' => 'required|string',
            'image' => 'file|image|required'
        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/partnership', 'public');

        if (partnership::create($data)) {
            alert()->success("{$data['nama']}", 'Berhasil Di Tambah');
            return to_route('partnership.index');
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
    public function edit(partnership $partnership)
    {
        return view('dashboard.partnership.edit', compact('partnership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, partnership $partnership)
    {
        $request->validate([
            'nama' => 'string|required',
            'perusahaan' => 'required|string',
            'image' => 'file|image|'
        ]);

        $dataId = $partnership->find($partnership->id);
        $data = $request->all();
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/partnership', 'public');
        }

        if ($dataId->update($data)) {
            alert()->success("{$data['nama']}", 'Berhasil Di Update');
            return to_route('partnership.index');
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
    public function destroy(partnership $partnership)
    {
        Storage::delete('public/' . $partnership->image);
        if ($partnership->delete()) {
            alert()->success("{$partnership['nama']}", 'Berhasil Di Hapus');
            return back();
        } else {
            alert()->error('Gagal');
            return back();
        }
    }
}
