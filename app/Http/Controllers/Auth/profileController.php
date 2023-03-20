<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('dashboard.profile.index');
    }

    public function edit($profile)
    {
        $profile = User::findOrFail($profile);
        return view('dashboard.profile.edit', compact('profile'));
    }

    public function update(Request $request, User $profile)
    {
        $dataId = $profile->find($profile->id);
        $data = $request->all();
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/admin', 'public');
        }

        if ($dataId->update($data)) {
            alert()->success('Success', 'Selamat Anda Berhasil Mengupdate Profile');
            return to_route('profile.index');
        } else {
            alert()->error('Gagal');
            return back();
        }
    }
}
