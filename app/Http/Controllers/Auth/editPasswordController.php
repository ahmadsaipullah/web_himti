<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class editPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit()
    {
        return view('dashboard.profile.edit_password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed', 'string'],

        ]);

        $currentpassword = auth()->user()->password;
        $old_password =  request('old_password');

        if (Hash::check($old_password, $currentpassword)) {

            auth()->user()->update([
                'password' => bcrypt(request('password'))
            ]);

            alert()->success('Berhasil Di Update Password');
            return back();
        } else {
            alert()->error('password salah');
            return back();
        }

        // throw ValidationException::withMessages(['old_password' => 'Password Tidak Sesuai']);

    }
}
