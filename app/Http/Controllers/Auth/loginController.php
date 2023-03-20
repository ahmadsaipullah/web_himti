<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    public function login()
    {
        return view('login.login');
    }

    public function log(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min:6'],

        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            alert()->success('Success', 'Selamat Anda Berhasil Login');
            return redirect()->intended('/dashboard');
        }

        return back()->with('LoginError', 'LoginFailed');
    }


    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }
}
