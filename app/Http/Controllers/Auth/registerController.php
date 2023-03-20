<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\level;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class registerController extends Controller
{
    public function index()
    {
        $levels = level::all();
        return view('login.register', compact('levels'));
    }

    public function store(Request $request)
    {

        $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users'],
            'no_hp' => ['required', 'string'],
            'password' => ['required', 'min:6'],
            'id_level' => '',
            'image' => '',

        ]);

        user::create([

            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password),
            'id_level' => $request->id_level,
            'image' => $request->image,

        ]);

        alert()->success('Success', 'Selamat Anda Sudah Terdaftar');
        return to_route('login');
    }
}
