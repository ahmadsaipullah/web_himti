<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(){
        return view('login.login');
    }

    public function log(Request $request){

        $credentials = $request->validate([
                'name' => '',
                'email' => ['required','email:dns'],
                'password' => ['required_with:verfikasi_password','same:verifikasi_password','min:6'],
                'verifikasi_password' => ['min:6']
        ]);

        if(Auth::attempt($credentials)) {

                $request->session()->regenerate();
                alert()->success('Success','Selamat Anda Berhasil Login');
                return redirect()->intended('/dashboard');
        }

        return back()->with('LoginError','LoginFailed');
    }


    public function logout(Request $request) {

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return to_route('login');
    }
}
