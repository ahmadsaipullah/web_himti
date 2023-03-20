<?php

namespace App\Http\Controllers\Setting;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class footerController extends Controller
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
        $footers = Footer::all();
        return view('dashboard.footer.index', compact('footers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit(Footer $footer)
    {
        return view('dashboard.footer.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Footer $footer)
    {
        $validasi = $request->validate([

            'email' => 'string|required|email:dns|unique:footers,email,' . $footer->id,
            'nomor_hp' => 'string|required|unique:footers,nomor_hp,' . $footer->id,
            'information' => 'string|required|unique:footers,information,' . $footer->id,
            'copyright' => 'required|string'
        ]);

        if ($footer->update($validasi)) {
            alert()->success('Footer Berhasil Di Update');
            return to_route('footer.index');
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
    public function destroy($id)
    {
        //
    }
}
