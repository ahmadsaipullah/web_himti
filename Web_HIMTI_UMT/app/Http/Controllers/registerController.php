<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class registerController extends Controller
{
    public function register(){
        return view('login.register');
    }

    public function regist(Request $request){

        $request->validate([

            'name' => ['required','string','max:255'],
            'email' => ['required','string','email:dns','max:255','unique:users'],
            'no_hp' => ['required','string'],
            'password' => ['required_with:verfikasi_password','same:verifikasi_password','min:6'],
            'verifikasi_password' => ['min:6']

        ]);

        $user = user::create([

            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password),
            'verifikasi_password' => bcrypt($request->verifikasi_password)

        ]);

        alert()->success('Success','Selamat Anda Sudah Terdaftar');
        return to_route('login');
    }
}
